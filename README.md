Symfony NestedMenuBundle
===================

Welcome to NestedMenuBundle - a Symfony bundle to create a nested menu

![Admin Nested Menu](http://i.imgur.com/c3vBQYu.jpg)
![Edit Item](http://i.imgur.com/rYxwVAa.jpg)
![Delete Item](http://i.imgur.com/JWnuKSM.jpg)


Installation
------------

Step 1: Download the Bundle
~~~~~~~~~~~~~~~~~~~~~~~~~~~

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:


    $ composer require stiti/nestedmenubundle 1.0.x-dev


Step 2: Enable the Bundle
Then, enable the bundle by adding the following line in the ````app/AppKernel.php````
file of your project:

~~~~~~~~~~~~~~~~~~~~~~~~~

    <?php
    // app/AppKernel.php

    // ...
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...

                new NestedMenuBundle\NestedMenuBundle(),
            );

            // ...
        }

        // ...
    }

Step 3: update schema

    php bin/console doctrine:schema:update --force
~~~~~~~~~~~~~~~~~~~~~~~~~

Step 4: install assets

    php bin/console assets:install
~~~~~~~~~~~~~~~~~~~~~~~~~

Step 5:foad Fixtures with DoctrineFixturesBundle

    php bin/console doctrine:fixtures:load


Usage

In your template twig insert this code
![Frontend Nested Menu](http://i.imgur.com/VE7YKdR.jpg)

    {{ nestedMenu() }}

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
