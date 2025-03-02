<?php

// 
// Автор: ADVSPACE STUDIO advelsert@gmail.com
// Copyright (c) 2025, ADVELSERT
// Лицензия: GNU General Public License v3.0 - https://www.gnu.org/licenses/gpl-3.0.html
// Версия: 1.0.0
// Сайт: https://vk.com/advelsert
// 

namespace ADVSPACE;

use pocketmine\command\Command;
use pocketmine\entity\Effect;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;

class EffectsMain extends PluginBase {

    /**
     * 
     * @param CommandSender $sender
     * @param Command $command
     * @param string $label
     * @param array $args
     * 
     * @return bool
     */
    public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool {
        $cmd_name = $command->getName();

        if ($cmd_name === "speed") {
            if (!isset($args[0]) || !is_numeric($args[0]) || $args[0] < 1 || $args[0] > 5) {
                $sender->sendMessage("§4Скорость §rx §cИспользуйте: /speed [1-5]");
                return true;
            }
            $sender->sendMessage("§4Скорость §rx §2Вы успешно §bпоменяли §2скорость!");
            if (intval($args[0]) === 1) {
                $sender->removeEffect(Effect::SPEED);
            } else {
                $sender->addEffect(
                    Effect::getEffect(1)
                        ->setVisible(false)
                        ->setAmplifier(intval($args[0]) - 1)
                        ->setDuration(20 * 200000)
                );
            }
            return true;
        } elseif ($cmd_name == "jump") {
            if (!isset($args[0]) || !is_numeric($args[0]) || $args[0] < 1 || $args[0] > 3) {
                $sender->sendMessage("§4Прыжок §rх §cИспользуйте: /jump [1-3]");
                return true;
            }
            $sender->sendMessage("§4Прыжок §rх §2Вы успешно §bпоменяли §2высоту прыжка!");
            if (intval($args[0]) === 1) {
                $sender->removeEffect(Effect::JUMP_BOOST);
            } else {
                $sender->addEffect(
                    Effect::getEffect(8)
                        ->setVisible(false)
                        ->setAmplifier(intval($args[0]) - 1)
                        ->setDuration(20 * 200000)
                );
            }
            return true;
        } elseif ($cmd_name == "health") {
            $sender->addEffect(
                Effect::getEffect(21)
                    ->setVisible(false)
                    ->setAmplifier(4)
                    ->setDuration(20 * 200000)
            );
            $sender->addEffect(
                Effect::getEffect(10)
                    ->setVisible(false)
                    ->setAmplifier(255)
                    ->setDuration(20)
            );
            $sender->sendMessage("§4Здоровье §rх §cВы успешно включили 2 полоску здоровья!");
            return true;
        } elseif ($command->getName() === "heal") {
            $sender->addEffect(
                Effect::getEffect(10)
                    ->setVisible(false)
                    ->setAmplifier(255)
                    ->setDuration(20)
            );
            $sender->sendMessage("§4Здоровье §rх §cВы успешно пополнили здоровье!");
            return true;
        }
        return false;
    }
}
