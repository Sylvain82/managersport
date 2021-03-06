<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;

    }

    #[Route('/joueurs', name: 'players')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->entityManager = $entityManager;
        $players = $this->entityManager->getRepository(Player::class)->findAll();

//        $generator = Factory::create("fr_FR");
//
//        for ($i = 0; $i <= 20 ; $i++) {
//            $category = (new Player())
//                ->setName($generator->lastName)
//                ->setFirstname($generator->firstNameFemale)
//                ->setEmail($generator->email)
//                ->setPhone($generator->mobileNumber)
//                ->setAdressePostale($generator->address)
//                ->setDateNaissance($generator->dateTimeBetween('1993/01/01', '2006/12/31'))
//                ->setPhoto($generator->imageUrl($width = 640, $height = 480), 'women')
//                ->setLicence($generator->randomNumber(8))
//                ->setPresence($generator->randomElement(array ('0','1')))
//                ->setPosition($generator->randomElement(array ('GK','DC','BU', 'DR', 'DL', 'MC', 'MR', 'ML')));
//
//            $entityManager->persist($category);
//        }
        $entityManager->flush();

        return $this->render('players/index.html.twig',[
            'players' => $players
        ]);
    }


    #[Route('/joueur/{licence}', name: 'player')]
    public function show($licence): Response
    {
        $player = $this->entityManager->getRepository(Player::class)->findOneByLicence($licence);

        $dateNaissance = $player->getDateNaissance($player)->Format("y-m-d");
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
        $age = $diff->format('%y');



        if(!$player) {
            return $this->redirectToRoute('players');
        }

        return $this->render('players/show.html.twig',[
            'player' => $player,
            'age' => $age


        ]);

    }


}

