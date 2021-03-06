<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $tables = array(
        'users',
        'categories',
        'products',
        'tags',
        'product_tag',
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        switch (App::environment()) {
            case 'local':
                $this->cleanDB();

                $this->call(UsersTableSeeder::class);
                $this->call(CategoriesTableSeeder::class);
                $this->call(ProductsTableSeeder::class);
                $this->call(TagsTableSeeder::class);
                $this->call(ProductTagTableSeeder::class);

                break;
            default:
                break;
        }

        Model::reguard();
    }

    private function cleanDB()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}