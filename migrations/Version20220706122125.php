<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706122125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE admin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE agent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE agent_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contact_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE country_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mission_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mission_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE speciality_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stash_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stash_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE target_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE target_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, creation_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE agent (id INT NOT NULL, country_id INT NOT NULL, agent_list_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, code_name INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_268B9C9DF92F3E70 ON agent (country_id)');
        $this->addSql('CREATE INDEX IDX_268B9C9DEFFD7421 ON agent (agent_list_id)');
        $this->addSql('CREATE TABLE agent_speciality (agent_id INT NOT NULL, speciality_id INT NOT NULL, PRIMARY KEY(agent_id, speciality_id))');
        $this->addSql('CREATE INDEX IDX_829171813414710B ON agent_speciality (agent_id)');
        $this->addSql('CREATE INDEX IDX_829171813B5A08D7 ON agent_speciality (speciality_id)');
        $this->addSql('CREATE TABLE agent_list (id INT NOT NULL, mission_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E95342FBBE6CAE90 ON agent_list (mission_id)');
        $this->addSql('CREATE TABLE agent_list_agent (agent_list_id INT NOT NULL, agent_id INT NOT NULL, PRIMARY KEY(agent_list_id, agent_id))');
        $this->addSql('CREATE INDEX IDX_8E5ED991EFFD7421 ON agent_list_agent (agent_list_id)');
        $this->addSql('CREATE INDEX IDX_8E5ED9913414710B ON agent_list_agent (agent_id)');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, country_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, code_name INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C62E638F92F3E70 ON contact (country_id)');
        $this->addSql('CREATE TABLE contact_list (id INT NOT NULL, mission_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C377AE7BE6CAE90 ON contact_list (mission_id)');
        $this->addSql('CREATE TABLE contact_list_contact (contact_list_id INT NOT NULL, contact_id INT NOT NULL, PRIMARY KEY(contact_list_id, contact_id))');
        $this->addSql('CREATE INDEX IDX_BC9A0901A781370A ON contact_list_contact (contact_list_id)');
        $this->addSql('CREATE INDEX IDX_BC9A0901E7A1254A ON contact_list_contact (contact_id)');
        $this->addSql('CREATE TABLE country (id INT NOT NULL, name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mission (id INT NOT NULL, country_id INT NOT NULL, status_id INT NOT NULL, mission_type_id INT NOT NULL, speciality_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, code_name VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9067F23CF92F3E70 ON mission (country_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C6BF700BD ON mission (status_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C547018DE ON mission (mission_type_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C3B5A08D7 ON mission (speciality_id)');
        $this->addSql('CREATE TABLE mission_type (id INT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE speciality (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE stash (id INT NOT NULL, country_id INT NOT NULL, code INT NOT NULL, address VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_92633881F92F3E70 ON stash (country_id)');
        $this->addSql('CREATE TABLE stash_list (id INT NOT NULL, mission_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A9125C8EBE6CAE90 ON stash_list (mission_id)');
        $this->addSql('CREATE TABLE stash_list_stash (stash_list_id INT NOT NULL, stash_id INT NOT NULL, PRIMARY KEY(stash_list_id, stash_id))');
        $this->addSql('CREATE INDEX IDX_EDBB7A84685D9003 ON stash_list_stash (stash_list_id)');
        $this->addSql('CREATE INDEX IDX_EDBB7A844592380C ON stash_list_stash (stash_id)');
        $this->addSql('CREATE TABLE status (id INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE target (id INT NOT NULL, country_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, code_name INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_466F2FFCF92F3E70 ON target (country_id)');
        $this->addSql('CREATE TABLE target_list (id INT NOT NULL, mission_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_89D0EEA9BE6CAE90 ON target_list (mission_id)');
        $this->addSql('CREATE TABLE target_list_target (target_list_id INT NOT NULL, target_id INT NOT NULL, PRIMARY KEY(target_list_id, target_id))');
        $this->addSql('CREATE INDEX IDX_5885A2D8F6C6AFE0 ON target_list_target (target_list_id)');
        $this->addSql('CREATE INDEX IDX_5885A2D8158E0B66 ON target_list_target (target_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DEFFD7421 FOREIGN KEY (agent_list_id) REFERENCES agent_list (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agent_speciality ADD CONSTRAINT FK_829171813414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agent_speciality ADD CONSTRAINT FK_829171813B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agent_list ADD CONSTRAINT FK_E95342FBBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agent_list_agent ADD CONSTRAINT FK_8E5ED991EFFD7421 FOREIGN KEY (agent_list_id) REFERENCES agent_list (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE agent_list_agent ADD CONSTRAINT FK_8E5ED9913414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_list ADD CONSTRAINT FK_6C377AE7BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_list_contact ADD CONSTRAINT FK_BC9A0901A781370A FOREIGN KEY (contact_list_id) REFERENCES contact_list (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_list_contact ADD CONSTRAINT FK_BC9A0901E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C547018DE FOREIGN KEY (mission_type_id) REFERENCES mission_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stash ADD CONSTRAINT FK_92633881F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stash_list ADD CONSTRAINT FK_A9125C8EBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stash_list_stash ADD CONSTRAINT FK_EDBB7A84685D9003 FOREIGN KEY (stash_list_id) REFERENCES stash_list (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE stash_list_stash ADD CONSTRAINT FK_EDBB7A844592380C FOREIGN KEY (stash_id) REFERENCES stash (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFCF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE target_list ADD CONSTRAINT FK_89D0EEA9BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE target_list_target ADD CONSTRAINT FK_5885A2D8F6C6AFE0 FOREIGN KEY (target_list_id) REFERENCES target_list (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE target_list_target ADD CONSTRAINT FK_5885A2D8158E0B66 FOREIGN KEY (target_id) REFERENCES target (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE agent_speciality DROP CONSTRAINT FK_829171813414710B');
        $this->addSql('ALTER TABLE agent_list_agent DROP CONSTRAINT FK_8E5ED9913414710B');
        $this->addSql('ALTER TABLE agent DROP CONSTRAINT FK_268B9C9DEFFD7421');
        $this->addSql('ALTER TABLE agent_list_agent DROP CONSTRAINT FK_8E5ED991EFFD7421');
        $this->addSql('ALTER TABLE contact_list_contact DROP CONSTRAINT FK_BC9A0901E7A1254A');
        $this->addSql('ALTER TABLE contact_list_contact DROP CONSTRAINT FK_BC9A0901A781370A');
        $this->addSql('ALTER TABLE agent DROP CONSTRAINT FK_268B9C9DF92F3E70');
        $this->addSql('ALTER TABLE contact DROP CONSTRAINT FK_4C62E638F92F3E70');
        $this->addSql('ALTER TABLE mission DROP CONSTRAINT FK_9067F23CF92F3E70');
        $this->addSql('ALTER TABLE stash DROP CONSTRAINT FK_92633881F92F3E70');
        $this->addSql('ALTER TABLE target DROP CONSTRAINT FK_466F2FFCF92F3E70');
        $this->addSql('ALTER TABLE agent_list DROP CONSTRAINT FK_E95342FBBE6CAE90');
        $this->addSql('ALTER TABLE contact_list DROP CONSTRAINT FK_6C377AE7BE6CAE90');
        $this->addSql('ALTER TABLE stash_list DROP CONSTRAINT FK_A9125C8EBE6CAE90');
        $this->addSql('ALTER TABLE target_list DROP CONSTRAINT FK_89D0EEA9BE6CAE90');
        $this->addSql('ALTER TABLE mission DROP CONSTRAINT FK_9067F23C547018DE');
        $this->addSql('ALTER TABLE agent_speciality DROP CONSTRAINT FK_829171813B5A08D7');
        $this->addSql('ALTER TABLE mission DROP CONSTRAINT FK_9067F23C3B5A08D7');
        $this->addSql('ALTER TABLE stash_list_stash DROP CONSTRAINT FK_EDBB7A844592380C');
        $this->addSql('ALTER TABLE stash_list_stash DROP CONSTRAINT FK_EDBB7A84685D9003');
        $this->addSql('ALTER TABLE mission DROP CONSTRAINT FK_9067F23C6BF700BD');
        $this->addSql('ALTER TABLE target_list_target DROP CONSTRAINT FK_5885A2D8158E0B66');
        $this->addSql('ALTER TABLE target_list_target DROP CONSTRAINT FK_5885A2D8F6C6AFE0');
        $this->addSql('DROP SEQUENCE admin_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE agent_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE agent_list_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contact_list_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE country_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mission_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mission_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE speciality_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stash_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stash_list_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE target_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE target_list_id_seq CASCADE');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE agent_speciality');
        $this->addSql('DROP TABLE agent_list');
        $this->addSql('DROP TABLE agent_list_agent');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_list');
        $this->addSql('DROP TABLE contact_list_contact');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE mission_type');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE stash');
        $this->addSql('DROP TABLE stash_list');
        $this->addSql('DROP TABLE stash_list_stash');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE target');
        $this->addSql('DROP TABLE target_list');
        $this->addSql('DROP TABLE target_list_target');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
