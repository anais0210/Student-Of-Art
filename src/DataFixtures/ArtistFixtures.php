<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$categoriesAvailable = [
    		Artist::CATEGORY_DRAWING,
    		Artist::CATEGORY_PAINT,
    		Artist::CATEGORY_SCULPTOR,
    		Artist::CATEGORY_GRAPHICS,
    	];

        for($i = 0; $i <= 15; $i++) {
        	$randomCategories = [
        		$categoriesAvailable[rand(0, 3)],
        		$categoriesAvailable[rand(0, 3)]
        	];

        	$artist = new Artist();
        	$artist->setName('Artiste n°'.$i)
        		->setUserName('Alex n°' .$i)
        		->setLastName('prenom' .$i)
        		->setCity('Aix en provence' .$i)
        		->SetCountry('France' .$i)
        		->setEmail($i.'@test.com')
        		->setPassword('motDePasse')
        		->setUploads('http://plachold.it/350x150')
        		->setBiography('biographie')
        		->setBirthdayDate(new \DateTime('10-12-1985'))
        		->setCategories($randomCategories)
        	;

        	$manager->persist($artist);
        }

        $manager->flush();
    }
}
