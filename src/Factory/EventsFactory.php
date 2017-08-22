<?php

namespace VkEvents\Factory;


class EventsFactory
{
    public static function createEvent($type)
    {
        $class = 'VkEvents\Events\\' . self::parse($type);
        if (class_exists($class)) {
            return new $class;
        } else {
            throw new Exception('class (' . $class . ') not exists');
        }
    }

    public static function parse($type)
    {
        $pos = strpos($type, '_');

        if ($pos === false) {
            $class = ucfirst($type);
            return $class . '\\' . $class;
        } else {
            $listWordsClass = explode('_', $type);
            foreach ($listWordsClass as $key => $word) {
                $listWordsClass[$key] = ucfirst($word);
            }
            $class = implode('', $listWordsClass);
            return $listWordsClass[0] . '\\' . $class;
        }
    }
}