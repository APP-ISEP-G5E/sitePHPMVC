<?php
function MdP($mdp) : string
{
$part1 = strlen($mdp);
$part1 = ((((($part1**$part1) + 5)/3) + 30)/$part1);

$part2 = strlen($part1.$mdp);
$part2 = (((($part2 + 65)/3)*$part2)**3);

$part3 = strlen($part2.$part1.$mdp.$part2);
$part3 = ((((($part2*$part3) + 19)/$part1) + 6)*5);

$texthash = md5($part1.$mdp.$part3);
$texthash2 = sha1($part2.$mdp.$part3.$texthash);
$texthash3 = hash('sha512', $texthash.$mdp.$texthash2.$part3);

$lol = $texthash.$texthash3.$texthash2;
return $lol;
}
?>
