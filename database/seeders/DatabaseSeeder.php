<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocationsSeeder::class);

        $products = [
            [
                'name' => 'Apple Iphone 14 Pro',
                'desc' => 'Apple iPhone 14 Pro Processor : Apple A16 Bionic (4 nm) Hexa-core (2x3.46 GHz Everest + 4x2.02 GHz Sawtooth) Memory : RAM 6GB + ROM 128GB Display : 6.1 inches 1179 x 2556 pixels, 19.5:9 ratio (~460 ppi density) LTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM) Battery : Li-Ion 3200 mAh Network : GSM / CDMA / HSPA / EVDO / LTE / 5G OS : iOS 16',
                'price' => '20000000',
                'stok' => '100',
                'sold' => '50',
                'photo' => 'iphone14-1.jpg',
                'category_id' => '1',
                'store_id' => '1',
            ],
            [
                'name' => 'ASUS ROG STRIX SCAR 17 SE G733CX',
                'desc' => 'Processor : Intel® Core™ i9-12950HX Processor 2.3 GHz (30M Cache, up to 5.0 GHz, 16 cores: 8 P-cores and 8 E-cores) Memory : 32GB (16GB DDR5-4800 SO-DIMM *2 Graphics : NVIDIA® GeForce RTX™ 3080 Ti Laptop GPU 8GB GDDR6 MUX Switch + Optimus Storage : 2TB M.2 NVMe™ PCIe® 4.0 SSD Display : 17.3-inch WQHD (2560 x 1440) 16:9 IPS-level ; Refresh Rate 240Hz ; Response Time (G2G) 3ms ; Brightness 300nits ; DCI-P3 % 100% OS : Windows 11 Home Single Language 64',
                'price' => '10439000',
                'stok' => '20',
                'sold' => '10',
                'photo1' => 'asusrogstrix-1.jpg',
                'category_id' => '2',
                'store_id' => '2',
            ],
            [
                'name' => 'Apple IMac M1 24”',
                'desc' => 'Processor : Apple M1 chip, CPU 8-core, Neural Engine 16-core Memory : Integrated memory 8GB Graphics : GPU up to 8-core Storage : SSD 256GB Display : Retina 4.5K, 24 inci, resolusi 4480 x 2520 piksel, 500 nit OS : macOS 10.13 High Sierra',
                'price' => '25125000',
                'stok' => '120',
                'sold' => '30',
                'photo' => 'appleimac-1.jpg',
                'category_id' => '3',
                'store_id' => '3',
            ],
        ];

        $category = [
            [
                'name' => 'Smartphone',
                'photo' => 'smartphone.jpg'
            ],
            [
                'name' => 'Laptop',
                'photo' => 'laptop.jpg'
            ],
            [
                'name' => 'PC All In One',
                'photo' => 'pc_all_in_one.png'
            ]
        ];

        $store = [
            [
                'name' => 'Pstore',
                'location' => 'Jakarta',
                'rating' => '4.5'
            ],
            [
                'name' => 'Studio Ponsel',
                'location' => 'Depok',
                'rating' => '4.9'
            ],
            [
                'name' => 'Wah Gadget',
                'location' => 'Bekasi',
                'rating' => '4.7'
            ],
        ];

        $user = [
            [
                'name' => 'Faiz',
                'email' => 'alqassamf@gmail.com',
                'password' => 'alqassamf123',
                'role' => 'admin',
                'isactive' => '1',
                'photo' => '',
                'address' => 'Bekasi',
                'phone_number' => '089698085698',
            ],
            [
                'name' => 'Chumaedi',
                'email' => 'Chumaedi@gmail.com',
                'password' => 'chumaedi',
                'role' => 'customer',
                'isactive' => '1',
                'photo' => '',
                'address' => 'Tanggerang',
                'phone_number' => '',
            ],
            [
                'name' => 'Andika',
                'email' => 'andika@gmail.com',
                'password' => 'andika',
                'role' => 'customer',
                'isactive' => '0',
                'photo' => '',
                'address' => 'Sulawesi',
                'phone_number' => '',
            ],
        ];
        

        $orders = [
            [
                'order_quantity' => '2',
                'total_price' => '10000000',
                'products_id' => '1',
                'users_id' => '1',
            ],
            [
                'order_quantity' => '4',
                'total_price' => '20000000',
                'products_id' => '2',
                'users_id' => '2',
            ],
            [
                'order_quantity' => '6',
                'total_price' => '10000000',
                'products_id' => '1',
                'users_id' => '3',
            ],
        ];

        $checkout = [
            [
                'status' => '',
                'total_price' => '10000000',
                'orders_id' => '1',
                'users_id' => '1',

            ],
            [
                'status' => '',
                'total_price' => '20000000',
                'orders_id' => '2',
                'users_id' => '2',

            ],
            [
                'status' => '',
                'total_price' => '10000000',
                'orders_id' => '3',
                'users_id' => '3',

            ],
        ];
        
        Category::insert($category);
        Store::insert($store);
        Product::insert($products);
        User::insert($user);
        Orders::insert($orders);
        Checkout::insert($checkout);
    }
}
