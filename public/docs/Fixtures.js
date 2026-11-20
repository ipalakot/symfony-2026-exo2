IV.	MANIPULATION DES ENTITES ENTITY MANAGER

1)	Gestion de Fausses données 
  a).Fixtures
      Commandes de Bases
        //-> composer require --dev orm-fixtures
        //-> php bin/console make:fixtures 
        //  //-> php bin/console doctrine:fixtures:load 

    b).Fakers
      https://github.com/FakerPHP/Faker 
      https://github.com/fzaninotto/faker    
    
      # Commandes de Bases
        //->  composer require --dev orm-fixtures fakerphp/faker
        //->  php bin/console make:fixtures 
        //->  php bin/console doctrine:fixtures:load 

          
      # Format de Base

          <?php
          // use the factory to create a Faker\Generator instance
          $faker = Faker\Factory::create();

          // generate data by accessing properties
          echo $faker->name;
            // 'Lucy Cechtelar';
          echo $faker->address;
            // "426 Jordy Lodge
            // Cartwrightshire, SC 88120-6700"
          echo $faker->text;
            // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
            // et sit et mollitia sed.
          $faker->word                                             // 'aut'
          $faker-> words($nb = 3, $asText = false)                  // array('porro', 'sed', 'magni')
          $faker->sentence($nbWords = 6, $variableNbWords = true)
          $faker->title($gender = null|'male'|'female') 

          $faker->phoneNumber             // '201-886-0269 x3767'

         