<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * create() -> registra en la base de datos.
     * make()   -> construye un array.
     */
    public function run()
    {
        // crearemos 3 registros en la tabla Groups
        factory(App\Group::class, 3)->create();

        // crearemos 3 registros en la tabla Levels con datos personalizados.
        factory(App\Level::class)->create(['name' => 'Oro']);
        factory(App\Level::class)->create(['name' => 'Plata']);
        factory(App\Level::class)->create(['name' => 'Bronce']);

        // crearemos 5 Users y por cada User vamos a crear...
        factory(App\User::class, 5)->create()->each(function($user){
            // un Profile - Generamos un array que se salvara en la tabla Profile.
            $profile = $user->profile()->save(factory(App\Profile::class)->make());
            // una Location - Generamos un array que se salvara en la tabla Location.
            $profile->location()->save(factory(App\Location::class)->make());
            // un Group - Hacemos la relacion en la tabla pivote atando a ese User a varios Groups.
            $user->groups()->attach($this->array(rand(1,3)));
            // una Image (de perfil) con valores personzalizados.
            $user->image()->save(factory(App\Image::class)->make([
                'url' => 'https://picsum.photos/90/90/'
            ]));
        });

        // crearemos 4 registros en la tabla Categories
        factory(App\Category::class, 4)->create();

        // crearemos 12 registros en la tabla Tags
        factory(App\Tag::class, 12)->create();

        // crearemos 40 Posts y por cada Post vamos a crear...
        factory(App\Post::class, 40)->create()->each(function($post){
            // una Image (de Post) con valores personalizados.
            $post->image()->save(factory(App\Image::class)->make([
                'url' => 'https://picsum.photos/1024/1024/'
            ]));

            // un Tag - Hacemos la relacion en la tabla pivote atando ese Post a varios Tags.
            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);
            for($i = 0 ; $i < $number_comments; $i++){
                $post->comments()->save(factory(App\Comment::class)->make());
            }
        });

        // crearemos 40 Videos y por cada Video vamos a crear...
        factory(App\Video::class, 40)->create()->each(function($video){
            // una Image (de Video) con valores personalizados.
            $video->image()->save(factory(App\Image::class)->make([
                'url' => 'https://picsum.photos/1024/1024/'
            ]));

            // un Tag - Hacemos la relacion en la tabla pivote atando ese Video a varios Tags.
            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);
            for($i = 0 ; $i < $number_comments; $i++){
                $video->comments()->save(factory(App\Comment::class)->make());
            }
        });
    }

    // esta funcion devuelve un array con hasta 3 valores.
    public function array($max){
        $values = [];

        for( $i=1 ; $i < $max ; $i++){
            $values[] = $i;
        }

        return $values;
    }



}
