<?php
/**
 * @version		$Id: default_install.php 4336 2011-01-31 06:05:12Z severdia $
 * @package		Kunena
 * @subpackage	com_kunena
 * @copyright	Copyright (C) 2008 - 2009 Kunena Team. All rights reserved..
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.kunena.org
 */
defined('_JEXEC') or die;
$success = array(-1=>'FAILED', 0=>'FAILED', 1=>'OK');
$colors = array(-1=>'#cf7f00', 0=>'red', 1=>'green');

?>
<table>
<?php if ($this->status) foreach ($this->status as $status): ?>
	<tr>
		<td><?php echo $status['task']; ?></td>
		<td style="color: <?php echo $colors[$status['success']]; ?>">
		... <?php echo $success[$status['success']]; ?></td>
		<td><?php echo $status['msg']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<br />