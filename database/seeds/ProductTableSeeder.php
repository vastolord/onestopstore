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
        $product=new App\Product([
            'imgpath'=>'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png',
            'title'=>'Harry poddar1',
            'price'=>10,
            'description'=> 'lorem dsad es llg gkp'

        ]);
        $product->save();
        $product=new App\Product([
            'imgpath'=>'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png',
            'title'=>'Harry poddar2',
            'price'=>10,
            'description'=> 'lorem dsad es llg gkp'

        ]);
        $product->save();
        $product=new App\Product([
            'imgpath'=>'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png',
            'title'=>'Harry poddar3',
            'price'=>10,
            'description'=> 'lorem dsad es llg gkp'

        ]);
        $product->save();
        $product=new App\Product([
            'imgpath'=>'http://smartmobilestudio.com/wp-content/uploads/2012/06/leather-book-preview.png',
            'title'=>'Harry poddar4',
            'price'=>10,
            'description'=> 'lorem dsad es llg gkp'

        ]);
        $product->save();

    }
}
