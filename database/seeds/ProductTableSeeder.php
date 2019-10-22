<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Product::create([
          'name' => 'Kursi hijau bagus',
          'slug' => Str::slug('Kursi hijau bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_1.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);

      \App\Product::create([
          'name' => 'Kursi oren bagus',
          'slug' => Str::slug('Kursi oren bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_2.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 9,
      ]);

      \App\Product::create([
          'name' => 'Kursi kuning bagus',
          'slug' => Str::slug('Kursi kuning bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_3.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);

      \App\Product::create([
          'name' => 'Kursi warna warni bagus',
          'slug' => Str::slug('Kursi warna warni bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_4.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);

      \App\Product::create([
          'name' => 'Kursi putih bagus',
          'slug' => Str::slug('Kursi putih bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_5.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);

      \App\Product::create([
          'name' => 'Kursi hijau beda bagus',
          'slug' => Str::slug('Kursi hijau beda bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_6.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);

      \App\Product::create([
          'name' => 'Kursi putih keren',
          'slug' => Str::slug('Kursi putih keren'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_7.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);

      \App\Product::create([
          'name' => 'Kursi merah bagus',
          'slug' => Str::slug('Kursi merah bagus'),
          'admin' => 2,
          'price' => 100000,
          'image' => 'product_8.png',
          'desc' => 'Begitu pula pada teks deskripsi yang umumnya digunakan untuk menggambarkan suatu hal. Teks deskripsi membuat pembaca seolah masuk ke dalam suasana yang diceritakan di dalam teks.',
          'stock' => 10,
      ]);
    }
}
