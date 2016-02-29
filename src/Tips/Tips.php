<?php

namespace Tips;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Tips extends pluginBase implements Listener{
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0755, true);
        $this->message = new Config($this->getDataFolder()."message.yml", Config::YAML, array(
            "1" => 'ﾃﾞﾓﾍﾟﾁﾉｶﾞﾓｯﾄｶﾜｲｲﾖｰ',
            "2" => 'ｳｻｷﾞｶﾞﾆｹﾞﾃﾙ!',
            "3" => 'にゃんぱすー',
            "4" => 'コプァ...',
            "5" => 'そすんさー',
            ));
        $this->country->save();
    }
}
