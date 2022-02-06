<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220206103303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE finance (id INT AUTO_INCREMENT NOT NULL, montant INT DEFAULT NULL, justification VARCHAR(255) NOT NULL, date DATETIME NOT NULL, nom VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, recette TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE finance');
        $this->addSql('ALTER TABLE competition CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE event event VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE score score VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE stade stade VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE adversaire adversaire VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE carte carte VARCHAR(10000) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE equipe CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE division division VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE media CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE video video VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE titre titre VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE commentaire commentaire VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE player CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE phone phone VARCHAR(20) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE position position VARCHAR(30) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE licence licence VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE adresse_postale adresse_postale VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE genre genre VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE age age VARCHAR(50) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
