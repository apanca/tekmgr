<?php
/* Copyright (C) 2002,2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2005      Laurent Destailleur  <eldy@users.sourceforge.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

/**
        \file   	htdocs/user/group/pre.inc.php
        \brief  	Fichier gestionnaire du menu groupe d'utilisateurs
        \version    $Id$
*/

require("../../main.inc.php");

require(DOL_DOCUMENT_ROOT.'/usergroup.class.php');

function llxHeader($head = "", $urlp = "")
{
    global $user, $langs;

    top_menu($head);

    $menu = new Menu();


    if ($user->rights->user->user->lire || $user->admin)
    {
        $menu->add(DOL_URL_ROOT."/user/home.php", $langs->trans("Users"));
        $menu->add_submenu(DOL_URL_ROOT."/user/", $langs->trans("List"));
    }

    if($user->rights->user->user->creer || $user->admin)
    {
        $menu->add_submenu(DOL_URL_ROOT."/user/fiche.php?&amp;action=create", $langs->trans("NewUser"));
    }

    if ($user->rights->user->user->lire || $user->admin)
    {
        $menu->add(DOL_URL_ROOT."/user/home.php", $langs->trans("Groups"));
        $menu->add_submenu(DOL_URL_ROOT."/user/group/", $langs->trans("List"));
    }

    if($user->rights->user->user->creer || $user->admin)
    {
        $menu->add_submenu(DOL_URL_ROOT."/user/group/fiche.php?&amp;action=create", $langs->trans("NewGroup"));
    }


    left_menu($menu->liste);
}

?>