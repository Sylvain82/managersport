<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220205130933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE competition_player');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition_player (competition_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_F75ABAB67B39D312 (competition_id), INDEX IDX_F75ABAB699E6F5DF (player_id), PRIMARY KEY(competition_id, player_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE competition_player ADD CONSTRAINT FK_F75ABAB67B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_player ADD CONSTRAINT FK_F75ABAB699E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition CHANGE type type VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE event event VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE lieu lieu VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE score score VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE stade stade VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE adversaire adversaire VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE carte carte VARCHAR(10000) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE equipe CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE division division VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE finance CHANGE justification justification VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE categorie categorie VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE facture facture VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE media CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE video video VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE titre titre VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE commentaire commentaire VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE player CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE phone phone VARCHAR(20) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE position position VARCHAR(30) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE photo photo VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE licence licence VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE adresse_postale adresse_postale VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE genre genre VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE age age VARCHAR(50) DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE firstname firstname VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`, CHANGE lastname lastname VARCHAR(255) NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
