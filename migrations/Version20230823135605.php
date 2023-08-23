<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823135605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_2D5B0234F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, property_group_id INT NOT NULL, property_owner_id INT NOT NULL, city_id INT NOT NULL, label VARCHAR(25) DEFAULT NULL, description VARCHAR(255) NOT NULL, code_property VARCHAR(10) DEFAULT NULL, neighborhood VARCHAR(45) DEFAULT NULL, region VARCHAR(45) DEFAULT NULL, INDEX IDX_8BF21CDE12469DE2 (category_id), INDEX IDX_8BF21CDEA0D3ED03 (property_group_id), INDEX IDX_8BF21CDE20BB55BD (property_owner_id), INDEX IDX_8BF21CDE8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_group (id INT AUTO_INCREMENT NOT NULL, user_account_id INT NOT NULL, label VARCHAR(25) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_ABD385C83C0C9956 (user_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_owner (id INT AUTO_INCREMENT NOT NULL, user_acount_id INT NOT NULL, first_name VARCHAR(45) NOT NULL, last_name VARCHAR(45) DEFAULT NULL, telephone VARCHAR(45) NOT NULL, email VARCHAR(100) DEFAULT NULL, create_date TIME DEFAULT NULL, adress LONGTEXT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_97327718EDBE94E (user_acount_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tenant_info (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(45) NOT NULL, lastname VARCHAR(45) NOT NULL, telephone VARCHAR(45) NOT NULL, email VARCHAR(100) DEFAULT NULL, address LONGTEXT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_acount (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(45) NOT NULL, telephone VARCHAR(45) NOT NULL, email VARCHAR(45) DEFAULT NULL, company_name VARCHAR(45) DEFAULT NULL, company_telephone VARCHAR(45) DEFAULT NULL, password VARCHAR(45) NOT NULL, create_date DATETIME NOT NULL, update_date DATETIME NOT NULL, INDEX IDX_54C3D51E8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA0D3ED03 FOREIGN KEY (property_group_id) REFERENCES property_group (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE20BB55BD FOREIGN KEY (property_owner_id) REFERENCES property_owner (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE property_group ADD CONSTRAINT FK_ABD385C83C0C9956 FOREIGN KEY (user_account_id) REFERENCES user_acount (id)');
        $this->addSql('ALTER TABLE property_owner ADD CONSTRAINT FK_97327718EDBE94E FOREIGN KEY (user_acount_id) REFERENCES user_acount (id)');
        $this->addSql('ALTER TABLE user_acount ADD CONSTRAINT FK_54C3D51E8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE12469DE2');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA0D3ED03');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE20BB55BD');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE8BAC62AF');
        $this->addSql('ALTER TABLE property_group DROP FOREIGN KEY FK_ABD385C83C0C9956');
        $this->addSql('ALTER TABLE property_owner DROP FOREIGN KEY FK_97327718EDBE94E');
        $this->addSql('ALTER TABLE user_acount DROP FOREIGN KEY FK_54C3D51E8BAC62AF');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE property_group');
        $this->addSql('DROP TABLE property_owner');
        $this->addSql('DROP TABLE tenant_info');
        $this->addSql('DROP TABLE user_acount');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
