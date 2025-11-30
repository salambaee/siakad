# **NARASI PRESENTASI BACKEND SIAKAD - JEVON**

## **PEMBUKAAN**

"Selamat pagi, saya Jevon sebagai **Backend Developer** dalam proyek SIAKAD ini. Hari ini saya akan menjelaskan arsitektur backend yang kami bangun, mulai dari desain database, model relationships, business logic, hingga strategi data management."

---

## **BAGIAN 1: ARSITEKTUR DATABASE**

### **1.1 KONSEP DESAIN DATABASE**

"Kami mendesain database dengan pendekatan **normalized relational database** yang terdiri dari 8 tabel utama. Filosofi desain kami adalah:

- **Data Integrity**: Setiap data memiliki relasi yang jelas melalui foreign key constraints
- **Scalability**: Struktur yang mudah dikembangkan untuk fitur future
- **Consistency**: Validasi data di level database dan application"

### **1.2 STRUKTUR RELASI DATABASE (Visualisasi)**

"Berikut adalah hubungan antar tabel yang kami bangun:

```
📊 DATABASE RELATIONSHIP DIAGRAM:

prodi (1) ────┐
              ├── mahasiswa (many)       → Simpan data mahasiswa per prodi
              ├── dosen (many)           → Dosen pengajar per prodi  
              └── mata_kuliah (many)     → Kurikulum per prodi

mata_kuliah (1) ─── jadwal (many)        → Satu matkul bisa banyak jadwal
dosen (1) ───────── jadwal (many)        → Satu dosen bisa banyak jadwal

jadwal (1) ───┐
              ├── krs (many)             → Mahasiswa pilih jadwal via KRS
mahasiswa (1) ─┘

krs (1) ── nilai (1)                     → Satu KRS punya satu nilai
```

**Alasan desain ini:** Memisahkan concerns dan memungkinkan fleksibilitas - misalnya satu mata kuliah bisa diajar oleh multiple dosen di jadwal berbeda."

### **1.3 IMPLEMENTASI MIGRATIONS**

"Kami implementasi desain ini melalui **Laravel Migrations**:

**Contoh Migration Mahasiswa:**
```php
Schema::create('mahasiswa', function (Blueprint $table) {
    $table->bigInteger('nim')->primary();           // PK sebagai NIM
    $table->string('nama', 100);
    $table->foreignId('id_prodi')->constrained();   // FK ke prodi
    $table->string('angkatan', 4);
    $table->string('password');                     // Untuk authentication
    $table->timestamps();
});
```

**Key Decisions:**
- **Primary Key Custom**: NIM dan NIDN sebagai primary key, bukan auto-increment
- **Foreign Key Constraints**: Semua relasi protected dengan constraints
- **Data Types Optimization**: Sesuai dengan kebutuhan data riil"

---

## **BAGIAN 2: DATA MODEL & ELOQUENT RELATIONSHIPS**

### **2.1 AUTHENTICATION MULTI-ROLE**

"Kami implementasi **multi-role authentication** dengan 3 guard terpisah:

```php
// Model Mahasiswa sebagai Authenticatable
class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';  // Login menggunakan NIM
    public $incrementing = false;

    public function getAuthPassword() {
        return $this->password;     // Password hashing
    }
}
```

**Keuntungan pendekatan ini:**
- **Security Terpisah**: Tabel dan logic authentication berbeda per role
- **Data Isolation**: Mahasiswa tidak bisa akses data dosen, dan sebaliknya
- **Flexibility**: Bisa custom field login (NIM untuk mahasiswa, NIDN untuk dosen)"

### **2.2 ELOQUENT RELATIONSHIPS**

"Kami manfaatkan **Eloquent ORM** untuk mendefinisikan relationships:

**Contoh Complex Relationship di KRS:**
```php
class Krs extends Model
{
    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
    
    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
    
    public function nilai() {
        return $this->hasOne(Nilai::class, 'id_krs', 'id_krs');
    }
}
```

**Query Efficiency:**
```php
// Dengan eager loading, satu query dapat multiple related data
$krs = Krs::with(['mahasiswa', 'jadwal.matkul', 'nilai'])
          ->where('nim', $nim)
          ->get();
```

**Hasilnya:** Performa optimal dengan minimal database queries."

---

## **BAGIAN 3: BUSINESS LOGIC & CONTROLLERS**

### **3.1 AUTHENTICATION FLOW**

"**Login System** kami handle melalui `AuthController` dengan flow:

```php
public function login(Request $request)
{
    // Step 1: Validasi input
    $request->validate(['username' => 'required', 'password' => 'required']);
    
    // Step 2: Sequential multi-guard attempt
    if (Auth::guard('dosen')->attempt(['nidn' => $request->username, ...])) {
        return redirect()->route('dosen.dashboard');
    }
    if (Auth::guard('mahasiswa')->attempt(['nim' => $request->username, ...])) {
        return redirect()->route('mahasiswa.dashboard');
    }
    if (Auth::guard('admin')->attempt(['username' => $request->username, ...])) {
        return redirect()->route('admin.dashboard');
    }
    
    // Step 3: Fallback error handling
    return back()->withErrors(['username' => 'Credentials salah']);
}
```

**Alur User Experience:**
1. User input username/password
2. System coba login sebagai dosen → jika gagal
3. System coba login sebagai mahasiswa → jika gagal  
4. System coba login sebagai admin → jika gagal
5. Tampilkan error message"

### **3.2 ADMIN MANAGEMENT SYSTEM**

"**Admin Panel** kami bangun dengan CRUD operations yang robust:

**Contoh: Tambah Mahasiswa Baru**
```php
public function store(Request $request)
{
    // Validasi: NIM harus unique, prodi harus exists
    $request->validate([
        'nim' => 'required|numeric|unique:mahasiswa,nim',
        'nama' => 'required|string|max:100',
        'id_prodi' => 'required|exists:prodi,id_prodi',
        'angkatan' => 'required|string|max:4',
    ]);

    // Auto-generate password dari NIM
    Mahasiswa::create([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'id_prodi' => $request->id_prodi,
        'angkatan' => $request->angkatan,
        'password' => Hash::make($request->nim), // Security dengan convenience
    ]);

    return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan');
}
```

**Philosophy:** Balance antara security dan usability - password default mudah diingat (NIM) tapi tetap secure karena hashing."

### **3.3 ACADEMIC BUSINESS LOGIC**

"**KRS System** merupakan core academic feature:

```php
public function storeKrs(Request $request)
{
    $mahasiswa = Auth::guard('mahasiswa')->user();
    
    // Validasi: jadwal harus exists
    $request->validate([
        'id_jadwal' => 'required|array',
        'id_jadwal.*' => 'exists:jadwal,id_jadwal',
    ]);

    // Transaction untuk menjaga data consistency
    DB::transaction(function () use ($mahasiswa, $request) {
        // Hapus KRS lama untuk semester yang sama
        Krs::where('nim', $mahasiswa->nim)
            ->where('semester', 'Ganjil')
            ->where('tahun_ajaran', '2024/2025')
            ->delete();

        // Insert KRS baru
        foreach ($request->id_jadwal as $jadwalId) {
            Krs::create([
                'nim' => $mahasiswa->nim,
                'id_jadwal' => $jadwalId,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2024/2025',
                'status' => 'Pending', // Workflow: Pending → Disetujui
            ]);
        }
    });

    return redirect()->back()->with('success', 'KRS berhasil diajukan!');
}
```

**Business Rules Implemented:**
- Satu mahasiswa tidak bisa double KRS untuk semester sama
- Status workflow: Pending → Disetujui/Ditolak
- Transaction ensure: All or nothing operation"

### **3.4 IPK CALCULATION LOGIC**

"**Perhitungan IPK** menggunakan weighted average berdasarkan SKS:

```php
public function informasi()
{
    $mahasiswa = Auth::guard('mahasiswa')->user();
    $krs = Krs::with(['jadwal.matkul', 'nilai'])
                ->where('nim', $mahasiswa->nim)
                ->get();

    $totalSks = 0;
    $totalBobot = 0;

    foreach ($krs as $item) {
        if ($item->nilai && $item->nilai->nilai_angka !== null) {
            $sks = $item->jadwal->matkul->sks ?? 0;
            $totalSks += $sks;
            $totalBobot += ($sks * $item->nilai->nilai_angka);
        }
    }

    $ipk = $totalSks > 0 ? round($totalBobot / $totalSks, 2) : 0.00;
    
    return view('mahasiswa.informasi', compact('mahasiswa', 'krs', 'ipk', 'totalSks'));
}
```

**Algorithm:** (Σ(SKS × Nilai)) / Σ(SKS) - sama dengan perhitungan manual di akademik"

---

## **BAGIAN 4: DATA SEEDING & TESTING STRATEGY**

### **4.1 SEEDER EXECUTION STRATEGY**

"Kami implementasi **seeder dependencies** yang terstruktur:

```php
// DatabaseSeeder.php - Execution order matters!
public function run(): void
{
    $this->call([
        ProdiSeeder::class,     // 1. Base data dulu
        DosenSeeder::class,     // 2. Butuh prodi
        MataKuliahSeeder::class,// 3. Butuh prodi  
        MahasiswaSeeder::class, // 4. Butuh prodi
        JadwalSeeder::class,    // 5. Butuh matkul & dosen
        AdminSeeder::class,     // 6. Independent
    ]);
}
```

**Mengapa urutan penting?** Foreign key constraints require parent records exist first."

### **4.2 REALISTIC DATA GENERATION**

"**DosenSeeder** contohnya berisi 43 dosen real dengan data lengkap:

```php
$dosenData = [
    [
        'nidn' => 1011018001, 
        'nama' => 'Eka Mistiko Rini, S.Kom, M.Kom.',
        'id_prodi' => 1,
        'keahlian' => 'Ilmu Komputer, Rekayasa Perangkat Lunak',
        'peran' => 'Dosen'
    ],
    // ... 42 records lainnya
];
```

**Data Quality:** Nama lengkap dengan gelar, keahlian spesifik, distribusi prodi yang realistic"

### **4.3 SECURITY CONSISTENCY**

"**Password Strategy** konsisten across roles:
- **Dosen**: Password = NIDN (hashed)
- **Mahasiswa**: Password = NIM (hashed)  
- **Admin**: Predefined secure passwords

```php
// Consistent across all seeders
'password' => Hash::make((string)$dosen['nidn'])
```

**Balance:** Secure (hashed) tapi memorable untuk testing"

---

## **BAGIAN 5: SECURITY & VALIDATION ARCHITECTURE**

### **5.1 MULTI-LAYER SECURITY**

"Kami implementasi **defense in depth**:

1. **Database Level**: Foreign key constraints, unique constraints
2. **Application Level**: Laravel validation, authentication guards
3. **Business Logic Level**: Authorization checks, transaction safety"

### **5.2 INPUT VALIDATION STRATEGY**

"**Layered Validation** approach:

```php
// 1. Migration Level (Database)
$table->bigInteger('nim')->primary(); // Must be unique
$table->foreignId('id_prodi')->constrained(); // Must exist in prodi

// 2. Request Level (Application)  
$request->validate([
    'nim' => 'required|numeric|unique:mahasiswa,nim',
    'id_prodi' => 'required|exists:prodi,id_prodi',
]);

// 3. Business Logic Level
if ($mahasiswa->prodi_id != $jadwal->matkul->prodi_id) {
    // Cannot take courses from other programs
}
```

**Result:** Data integrity dari frontend sampai database"

---

## **KESIMPULAN & PENCAPAIAN**

### **6.1 ARCHITECTURE ACHIEVEMENTS**

"Yang berhasil kami bangun:

✅ **Robust Database Design** dengan relasi yang tepat
✅ **Multi-Role Authentication** yang secure dan flexible  
✅ **Comprehensive CRUD Operations** dengan validasi lengkap
✅ **Academic Business Logic** (KRS, Nilai, IPK) yang accurate
✅ **Data Seeding Strategy** dengan realistic testing data
✅ **Security Layers** dari database sampai application"

### **6.2 SCALABILITY READINESS**

"Arsitektur ini siap untuk **future enhancements**:

- **Tambahan Fitur**: Presensi, pembayaran, e-learning
- **API Development**: Ready untuk mobile apps
- **Performance Optimization**: Query efficiency sudah di-consider
- **Maintenance**: Code yang terorganisir dan documented"

### **6.3 CLOSING STATEMENT**

"Sebagai backend developer, saya bangga dengan arsitektur yang kami bangun. System ini tidak hanya functional tapi juga maintainable, scalable, dan secure. Terima kasih untuk perhatiannya, dan saya terbuka untuk pertanyaan lebih lanjut tentang technical implementation."

---

**DEMO FLOW SUGGESTION:**
1. Show database relationships diagram
2. Demonstrate AuthController login flow  
3. Show Admin CRUD operations
4. Demonstrate KRS business logic
5. Show data seeding results
6. Explain security measures