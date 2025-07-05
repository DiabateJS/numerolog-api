<?php
class Query {
    public static $SQL_SELECT_NBRE_INTIME = "select id, nbre, interpretation from nbre_intime where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_INTIME = "select id, nbre, interpretation from num_nbre_intime where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_INTIME = "select id, nbre, interpretation from nbre_intime";
    //public static $SQL_SELECT_ALL_NBRE_INTIME = "select id, nbre, interpretation from num_nbre_intime";

    public static $SQL_SELECT_NBRE_REALISATION = "select id, nbre, interpretation from nbre_realisation where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_REALISATION = "select id, nbre, interpretation from num_nbre_realisation where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_REALISATION = "select id, nbre, interpretation from nbre_realisation";
    //public static $SQL_SELECT_ALL_NBRE_REALISATION = "select id, nbre, interpretation from num_nbre_realisation";

    public static $SQL_SELECT_NBRE_EXPRESSION = "select id, nbre, interpretation from nbre_expression where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_EXPRESSION = "select id, nbre, interpretation from num_nbre_expression where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_EXPRESSION = "select id, nbre, interpretation from nbre_expression";
    //public static $SQL_SELECT_ALL_NBRE_EXPRESSION = "select id, nbre, interpretation from num_nbre_expression";

    public static $SQL_SELECT_NBRE_HEREDITAIRE = "select id, nbre, interpretation from nbre_hereditaire where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_HEREDITAIRE = "select id, nbre, interpretation from num_nbre_hereditaire where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_HEREDITAIRE = "select id, nbre, interpretation from nbre_hereditaire";
    //public static $SQL_SELECT_ALL_NBRE_HEREDITAIRE = "select id, nbre, interpretation from num_nbre_hereditaire";

    public static $SQL_SELECT_NBRE_ACTIF = "select id, nbre, interpretation from nbre_actif where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_ACTIF = "select id, nbre, interpretation from num_nbre_actif where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_ACTIF = "select id, nbre, interpretation from nbre_actif";
    //public static $SQL_SELECT_ALL_NBRE_ACTIF = "select id, nbre, interpretation from num_nbre_actif";

    public static $SQL_SELECT_NBRE_MANQUANT = "select id, nbre, interpretation from nbre_manquant where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_MANQUANT = "select id, nbre, interpretation from num_nbre_manquant where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_MANQUANT = "select id, nbre, interpretation from nbre_manquant";
    //public static $SQL_SELECT_ALL_NBRE_MANQUANT = "select id, nbre, interpretation from num_nbre_manquant";

    public static $SQL_SELECT_NBRE_DOMINANT = "select id, nbre, interpretation from nbre_dominant where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_DOMINANT = "select id, nbre, interpretation from num_nbre_dominant where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_DOMINANT = "select id, nbre, interpretation from nbre_dominant";
    //public static $SQL_SELECT_ALL_NBRE_DOMINANT = "select id, nbre, interpretation from num_nbre_dominant";

    public static $SQL_SELECT_NBRE_CHEMIN_VIE = "select id, nbre, interpretation from nbre_chemin_vie where nbre = :nbre";
    //public static $SQL_SELECT_NBRE_CHEMIN_VIE = "select id, nbre, interpretation from num_nbre_chemin_vie where nbre = :nbre";
    public static $SQL_SELECT_ALL_NBRE_CHEMIN_VIE = "select id, nbre, interpretation from nbre_chemin_vie";
    //public static $SQL_SELECT_ALL_NBRE_CHEMIN_VIE = "select id, nbre, interpretation from num_nbre_chemin_vie";

}