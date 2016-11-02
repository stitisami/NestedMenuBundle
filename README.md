Using sharethisBundle
===================

Welcome to sharethisBundle - a Symfony bundle to make share This buttons

![Admin Nested Menu](http://i.imgur.com/c3vBQYu.jpg)
![Edit Item](http://i.imgur.com/rYxwVAa.jpg)
![Delete Item](http://i.imgur.com/JWnuKSM.jpg)
![Frontend Nested Menu](http://i.imgur.com/VE7YKdR.jpg)


Installation
------------

Step 1: Download the Bundle
~~~~~~~~~~~~~~~~~~~~~~~~~~~

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

    $ composer require stiti/sharethisbundle 1.0.x-dev

Step 2: Enable the Bundle
~~~~~~~~~~~~~~~~~~~~~~~~~

Then, enable the bundle by adding the following line in the ````app/AppKernel.php````
file of your project:

    <?php
    // app/AppKernel.php

    // ...
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...

                new SharethisBundle\SharethisBundle(),
            );

            // ...
        }

        // ...
    }

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Usage

In your template twig insert this code

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

{{ nestedMenu() }}

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Administration Nested Menu

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

{{ nestedMenu() }}
