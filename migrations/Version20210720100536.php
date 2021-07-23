<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720100536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, rentals_id INT NOT NULL, car_fleets_id INT NOT NULL, seats_id INT NOT NULL, engines_id INT NOT NULL, brands_id INT NOT NULL, gears_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, availability TINYINT(1) NOT NULL, plate VARCHAR(10) NOT NULL, INDEX IDX_773DE69DA564EA6A (rentals_id), INDEX IDX_773DE69D24B903AC (car_fleets_id), INDEX IDX_773DE69DB103A3F8 (seats_id), INDEX IDX_773DE69D743D8A7 (engines_id), INDEX IDX_773DE69DE9EEC0C7 (brands_id), INDEX IDX_773DE69DC6B26989 (gears_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_fleet (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, engine VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gear (id INT AUTO_INCREMENT NOT NULL, gear VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_1619C27D67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seat (id INT AUTO_INCREMENT NOT NULL, seat SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, phone VARCHAR(14) NOT NULL, date_of_birth DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA564EA6A FOREIGN KEY (rentals_id) REFERENCES rental (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D24B903AC FOREIGN KEY (car_fleets_id) REFERENCES car_fleet (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DB103A3F8 FOREIGN KEY (seats_id) REFERENCES seat (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D743D8A7 FOREIGN KEY (engines_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DE9EEC0C7 FOREIGN KEY (brands_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DC6B26989 FOREIGN KEY (gears_id) REFERENCES gear (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D67B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DE9EEC0C7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D24B903AC');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D743D8A7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DC6B26989');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA564EA6A');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DB103A3F8');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D67B3B43D');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_fleet');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE gear');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE seat');
        $this->addSql('DROP TABLE `user`');
    }
}
