<?php
class Query {
    public static $SQL_SELECT_NBRE_INTIME = "select id, nbre, interpretation from nbre_intime where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_INTIME = "select id, nbre, interpretation from nbre_intime";

    public static $SQL_SELECT_NBRE_REALISATION = "select id, nbre, interpretation from nbre_realisation where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_REALISATION = "select id, nbre, interpretation from nbre_realisation";

    public static $SQL_SELECT_NBRE_EXPRESSION = "select id, nbre, interpretation from nbre_expression where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_EXPRESSION = "select id, nbre, interpretation from nbre_expression";

    public static $SQL_SELECT_NBRE_HEREDITAIRE = "select id, nbre, interpretation from nbre_hereditaire where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_HEREDITAIRE = "select id, nbre, interpretation from nbre_hereditaire";

    public static $SQL_SELECT_NBRE_ACTIF = "select id, nbre, interpretation from nbre_actif where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_ACTIF = "select id, nbre, interpretation from nbre_actif";

    public static $SQL_SELECT_NBRE_MANQUANT = "select id, nbre, interpretation from nbre_manquant where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_MANQUANT = "select id, nbre, interpretation from nbre_manquant";

    public static $SQL_SELECT_NBRE_DOMINANT = "select id, nbre, interpretation from nbre_dominant where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_DOMINANT = "select id, nbre, interpretation from nbre_dominant";

    public static $SQL_SELECT_NBRE_CHEMIN_VIE = "select id, nbre, interpretation from nbre_chemin_vie where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_CHEMIN_VIE = "select id, nbre, interpretation from nbre_chemin_vie";
    
    public static $SQL_INSERT_CATEGORIE = "insert into categorie (libelle, couleur) values (:libelle, :couleur)";
    //public static $SQL_INSERT_CATEGORIE = "insert into nt_categorie (libelle, couleur) values (:libelle, :couleur)";
    public static $SQL_SELECT_CATEGORIES = "select id, libelle, couleur from categorie";
    //public static $SQL_SELECT_CATEGORIES = "select id, libelle, couleur from nt_categorie";
    public static $SQL_SELECT_CATEGORIE = "select id, libelle, couleur from categorie where id = :id";
    //public static $SQL_SELECT_CATEGORIE = "select id, libelle, couleur from nt_categorie where id = :id";
    public static $SQL_UPDATE_CATEGORIE = "update categorie set libelle = :libelle , couleur = :couleur where id = :id";
    //public static $SQL_UPDATE_CATEGORIE = "update nt_categorie set libelle = :libelle , couleur = :couleur where id = :id";
    public static $SQL_DELETE_CATEGORIE = "delete from categorie where id = :id";
    //public static $SQL_DELETE_CATEGORIE = "delete from nt_categorie where id = :id";

    public static $SQL_INSERT_NOTE = "insert into note(titre, contenu, id_categorie) values (:titre, :contenu, :id_categorie)";
    //public static $SQL_INSERT_NOTE = "insert into nt_note(titre, contenu, id_categorie) values (:titre, :contenu, :id_categorie)";
    public static $SQL_SELECT_NOTES = "select id, titre, contenu, id_categorie from note";
    //public static $SQL_SELECT_NOTES = "select id, titre, contenu, id_categorie from nt_note";
    public static $SQL_SELECT_NOTE = "select id, titre, contenu, id_categorie from note where id = :id";
    //public static $SQL_SELECT_NOTE = "select id, titre, contenu, id_categorie from nt_note where id = :id";
    public static $SQL_UPDATE_NOTE = "update note set titre = :titre, contenu = :contenu, id_categorie = :id_categorie where id = :id";
    //public static $SQL_UPDATE_NOTE = "update nt_note set titre = :titre, contenu = :contenu, id_categorie = :id_categorie where id = :id";
    public static $SQL_DELETE_NOTE = "delete from note where id = :id";
    //public static $SQL_DELETE_NOTE = "delete from nt_note where id = :id";

}