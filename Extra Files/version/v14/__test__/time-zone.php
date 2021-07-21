<?php
$currenttz = 'America/Detroit';

$timezones = array(
  'America/Adak',
  'America/Anchorage',
  'America/Boise',
  'America/Chicago',
  'America/Denver',
  'America/Detroit',
  'America/Indiana/Indianapolis',
  'America/Indiana/Knox',
  'America/Indiana/Marengo',
  'America/Indiana/Petersburg',
  'America/Indiana/Tell_City',
  'America/Indiana/Vevay',
  'America/Indiana/Vincennes',
  'America/Indiana/Winamac',
  'America/Juneau',
  'America/Kentucky/Louisville',
  'America/Kentucky/Monticello',
  'America/Los_Angeles',
  'America/Menominee',
  'America/Metlakatla',
  'America/New_York',
  'America/Nome',
  'America/North_Dakota/Beulah',
  'America/North_Dakota/Center',
  'America/North_Dakota/New_Salem',
  'America/Phoenix',
  'America/Sitka',
  'America/Yakutat',
  'Pacific/Honolulu'
);
?>
<select name="tz">
<?php foreach($timezones as $item): ?>
  <option value="<?php echo $item; ?>" <?php if($currenttz==$item){echo 'selected';} ?>><?php echo $item; ?></option>
<?php endforeach; ?>
</select>