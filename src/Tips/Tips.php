<?php

namespace Tips;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\scheduler\PluginTask;

class Tips extends pluginBase implements Listener{

 function onEnable(){
  $this->getServer()->getPluginManager()->registerEvents($this, $this);
  if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0755, true);
  $this->message = new Config($this->getDataFolder()."message.yml", Config::YAML, array(
            "1" => 'ﾃﾞﾓﾍﾟﾁﾉｶﾞﾓｯﾄｶﾜｲｲﾖｰ',
            "2" => 'ｳｻｷﾞｶﾞﾆｹﾞﾃﾙ!',
            "3" => 'にゃんぱすー',
            "4" => 'コプァ...',
            "5" => 'そすんさー',
            ));
  $this->setup = new Config($this->getDataFolder()."setup.yml", Config::YAML, array(
            "time" => '60',
            ));
  $this->setup->save();
  $this->country->save();
 }

 function onRun(){
  $c = $this->message;
  $s = $this->setup->get('time');
  $a = $s * 20;
  $t = new MessageTask($this, $c);
  $this->getServer()->getScheduler()->scheduleDeleyedTask($t, $a);
 }
}
