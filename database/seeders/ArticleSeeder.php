<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@greentify.id'],
            ['name' => 'Greentify Admin', 'password' => bcrypt('password')]
        );

        $articles = [
            // ── Limbah ──────────────────────────────
            [
                'category' => 'limbah',
                'title' => '5 Cara Sederhana Mengurangi Sampah Plastik di Rumah',
                'excerpt' => 'Mulai dari botol minum hingga kantong belanja — langkah kecil yang dampaknya luar biasa bagi laut kita.',
                'content' => $this->longContent(
                    'Mengurangi sampah plastik tidak harus berarti mengubah seluruh gaya hidup dalam semalam. '
                    . 'Dengan lima kebiasaan sederhana berikut, keluarga Anda sudah berkontribusi nyata menjaga kebersihan laut dan tanah.',
                    [
                        'Ganti botol plastik dengan tumbler stainless steel atau kaca.',
                        'Bawa tas belanja sendiri saat berbelanja — lipat kecil dan simpan di tas.',
                        'Pilih produk dengan kemasan minimal atau refill.',
                        'Kompos sisa makanan alih-alih membuangnya ke tempat sampah campuran.',
                        'Daur ulang secara terpisah: kertas, kaca, logam, dan plastik.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&h=450&fit=crop',
            ],
            [
                'category' => 'limbah',
                'title' => 'Mengenal Zero Waste: Filosofi Hidup Tanpa Sampah',
                'excerpt' => 'Zero waste bukan berarti nol sampah total — tapi tentang membuat pilihan yang lebih sadar setiap hari.',
                'content' => $this->longContent(
                    'Gerakan zero waste mengajak kita untuk memikirkan kembali cara kita mengonsumsi. '
                    . 'Prinsip 5R — Refuse, Reduce, Reuse, Recycle, Rot — menjadi panduan utama.',
                    [
                        'Refuse: tolak barang sekali pakai yang tidak benar-benar diperlukan.',
                        'Reduce: beli lebih sedikit, pilih kualitas daripada kuantitas.',
                        'Reuse: manfaatkan kembali wadah, kantong, dan benda bekas.',
                        'Recycle: daur ulang sebagai pilihan terakhir.',
                        'Rot: kompos organik untuk menyuburkan tanah.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=800&h=450&fit=crop',
            ],

            // ── Konservasi ──────────────────────────
            [
                'category' => 'konservasi',
                'title' => 'Krisis Air Global: Apa yang Bisa Kita Lakukan?',
                'excerpt' => 'Dua miliar orang hidup di negara dengan tekanan air tinggi. Konservasi dimulai dari keran rumah Anda.',
                'content' => $this->longContent(
                    'Menurut UN-Water, satu dari empat orang di dunia tidak memiliki akses air minum yang aman. '
                    . 'Indonesia sendiri menghadapi tantangan besar dalam mengelola sumber daya air bersih.',
                    [
                        'Matikan keran saat menyikat gigi — hemat hingga 12 liter per menit.',
                        'Perbaiki kebocoran pipa sekecil apa pun.',
                        'Kumpulkan air hujan untuk menyiram tanaman.',
                        'Pilih peralatan hemat air: shower low-flow dan toilet dual-flush.',
                        'Edukasi anak tentang pentingnya air bersih sejak dini.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=800&h=450&fit=crop',
            ],
            [
                'category' => 'konservasi',
                'title' => 'Melindungi Terumbu Karang dari Pemanasan Global',
                'excerpt' => 'Koral bleaching mengancam 75% terumbu karang dunia. Inisiatif lokal bisa membuat perbedaan besar.',
                'content' => $this->longContent(
                    'Terumbu karang adalah rumah bagi 25% spesies laut meskipun hanya menutupi kurang dari 1% dasar laut. '
                    . 'Pemanasan global dan polusi telah menyebabkan pemutihan massal yang mengkhawatirkan.',
                    [
                        'Gunakan tabir surya reef-safe yang bebas oxybenzone dan octinoxate.',
                        'Kurangi jejak karbon: kurangi konsumsi energi dan transportasi.',
                        'Ikut serta dalam program coral planting komunitas.',
                        'Jangan membeli terumbu karang atau hiasan laut dari alam.',
                        'Sebarkan informasi tentang pentingnya ekosistem laut.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1546026423-cc4642628d2b?w=800&h=450&fit=crop',
            ],

            // ── Penghijauan ─────────────────────────
            [
                'category' => 'penghijauan',
                'title' => 'Urban Farming: Sawah di Atas Gedung Pencakar Langit',
                'excerpt' => 'Jakarta dan kota-kota besar mulai beralih ke pertanian vertikal dan rooftop garden.',
                'content' => $this->longContent(
                    'Pertanian perkotaan bukan lagi konsep futuristik. Di Jakarta, beberapa gedung komersial sudah '
                    . 'memiliki rooftop garden yang menghasilkan sayuran organik untuk kafe dan restoran di bawahnya.',
                    [
                        'Mulai dengan tanaman sederhana: kangkung, selada, dan tomat cherry.',
                        'Manfaatkan lahan kosong: teras, balkon, atau halaman belakang.',
                        'Gunakan sistem hidroponik sederhana untuk lahan terbatas.',
                        'Gabungkan dengan kompos sampah organik rumah tangga.',
                        'Ajak tetangga berkebun bersama — bangun komunitas hijau lokal.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800&h=450&fit=crop',
            ],
            [
                'category' => 'penghijauan',
                'title' => 'Mangrove Planting: Pelindung Pesisir dari Tsunami',
                'excerpt' => 'Hutan bakau terbukti mengurangi kekuatan gelombang laut hingga 80% — investasi alami terbaik.',
                'content' => $this->longContent(
                    'Indonesia memiliki garis pantai terpanjang keempat di dunia dan hutan mangrove terluas di Asia Tenggara. '
                    . 'Namun, deforestasi mangrove mengancam perlindungan alami ini.',
                    [
                        'Ikut program penanaman mangrove di pesisir terdekat.',
                        'Dukung regulasi perlindungan hutan bakau di daerah Anda.',
                        'Kurangi penggunaan plastik yang mencemari ekosistem pesisir.',
                        'Edukasi nelayan tentang manfaat jangka panjang mangrove.',
                        'Dukung riset tentang restorasi ekosistem pesisir.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&h=450&fit=crop',
            ],

            // ── Hutan ───────────────────────────────
            [
                'category' => 'hutan',
                'title' => 'Deforestasi Kalimantan: Catatan dari Garis Depan',
                'excerpt' => 'Satu hektar hutan hujan hilang setiap 10 detik. Para aktivis lokal membagikan kisah mereka.',
                'content' => $this->longContent(
                    'Kalimantan adalah rumah bagi salah satu hutan hujan tropis tertua di dunia. '
                    . 'Namun ekspansi perkebunan sawit dan pertambangan terus menggerogoti warisan alam ini.',
                    [
                        'Dukung produk sawit berkelanjutan (RSPO certified).',
                        'Konsumsi lebih sedikit daging — peternakan adalah pendorong utama deforestasi.',
                        'Dukung organisasi seperti WWF Indonesia dan Greenpeace.',
                        'Tulis kepada perwakilan Anda tentang kebijakan deforestasi nol.',
                        'Tanam pohon di lingkungan Anda — setiap pohon menghasilkan oksigen untuk 2 orang.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&h=450&fit=crop',
            ],
            [
                'category' => 'hutan',
                'title' => 'Keanekaragaman Hayati: 10 Spesies Kritis Indonesia',
                'excerpt' => 'Dari orangutan Sumatera hingga badak Jawa — daftar merah yang harus kita perjuangkan.',
                'content' => $this->longContent(
                    'Indonesia adalah salah satu dari 17 negara megabiodiversity di dunia dengan lebih dari 130.000 '
                    . 'spesies tumbuhan dan hewan. Namun banyak yang terancam punah.',
                    [
                        'Orangutan Kalimantan: populasi turun 50% dalam 60 tahun.',
                        'Harimau Sumatera: kurang dari 400 individu tersisa.',
                        'Badak Jawa: hanya 72 individu — spesies badak paling langka.',
                        'Komodo: terancam oleh perubahan iklim dan habitat.',
                        'Elang Jawa: simbol nasional yang terancam punah.',
                    ]
                ),
                'featured_image' => 'https://images.unsplash.com/photo-1535338454770-8be927b5a00b?w=800&h=450&fit=crop',
            ],
        ];

        foreach ($articles as $data) {
            $category = Category::where('slug', $data['category'])->first();
            if (!$category) continue;

            Article::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'content' => $data['content'],
                    'featured_image' => $data['featured_image'],
                    'status' => 'published',
                    'published_at' => now()->subDays(rand(1, 30)),
                ]
            );
        }
    }

    private function longContent(string $intro, array $points): string
    {
        $html  = "<p>{$intro}</p>\n\n";
        $html .= "<h3>Yang Bisa Anda Mulai Hari Ini</h3>\n<ul>\n";
        foreach ($points as $point) {
            $html .= "<li>{$point}</li>\n";
        }
        $html .= "</ul>\n\n";
        $html .= "<p>Perubahan besar dimulai dari langkah kecil. Bersama-sama, kita bisa membuat perbedaan nyata bagi planet ini.</p>";
        return $html;
    }
}
