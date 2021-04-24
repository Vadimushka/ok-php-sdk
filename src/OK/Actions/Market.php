<?php

namespace OK\Actions;

/**
 * @method \stdClass add($access_token, $params = []) Добавление товара
 * @method \stdClass addCatalog($access_token, $params = []) Добавление нового каталога в группу
 * @method \stdClass delete($access_token, $params = []) Удаление товара
 * @method \stdClass deleteCatalog($access_token, $params = []) Удаление каталога
 * @method \stdClass edit($access_token, $params = []) Редактирование товара
 * @method \stdClass editCatalog($access_token, $params = []) Редактирование каталога
 * @method \stdClass getByCatalog($access_token, $params = []) Получение товаров по ид каталога
 * @method \stdClass getByIds($access_token, $params = []) Получение товаров
 * @method \stdClass getCatalogsByGroup($access_token, $params = []) Получение каталогов группы
 * @method \stdClass getCatalogsByIds($access_token, $params = []) Получение каталогов по идентификаторам
 * @method \stdClass getProducts($access_token, $params = []) Получение товаров
 * @method \stdClass pin($access_token, $params = []) Прикрепление к верху/открепление товара.
 * @method \stdClass reorder($access_token, $params = []) Переместить товар внутри каталога
 * @method \stdClass reorderCatalogs($access_token, $params = []) Переместить каталоги внутри группы
 * @method \stdClass setStatus($access_token, $params = []) Установить статус товара
 * @method \stdClass updateCatalogsList($access_token, $params = []) Установить список каталогов, в которых будет состоять товар
 */
class Market extends BaseAction
{
}
