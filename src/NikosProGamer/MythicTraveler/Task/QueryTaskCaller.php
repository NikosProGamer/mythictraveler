<?php

namespace NikosProGamer\MythicTraveler\Task;

use pocketmine\scheduler\Task;

use NikosProGamer\MythicTraveler\MythicTraveler;

class QueryTaskCaller extends Task{

    private $plugin;
    private $host;
    private $port;
	
	public function __construct(MythicTraveler $plugin, string $host, int $port){
        $this->plugin = $plugin;
        $this->host = $host;
        $this->port = $port;
	}
	
	public function onRun(int $currentTick){
		$this->plugin->getServer()->getAsyncPool()->submitTask(new QueryTask($this->host, $this->port));
	}
}