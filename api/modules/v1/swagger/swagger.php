<?php

namespace api\modules\v1\swagger;

/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host="passerby.cn",
 *     basePath="/api/v1",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="接口文档",
 *         description="Version: __1.0.0__",
 *         @SWG\Contact(name = "wiwen", email = "shenggxhz@qq.com")
 *     ),
 * )
 *
 *
 * @SWG\Tag(
 *   name="user",
 *   description="用户接口列表",
 *   @SWG\ExternalDocumentation(
 *     description="Find out more about our store",
 *     url="http://swagger.io"
 *   )
 * )
 */


/**
 * @SWG\Definition(
 *   @SWG\Xml(name="##default")
 * )
 */
class ApiResponse
{
    /**
     * @SWG\Property(format="int32", description = "code of result")
     * @var int
     */
    public $code;
    /**
     * @SWG\Property
     * @var string
     */
    public $type;
    /**
     * @SWG\Property
     * @var string
     */
    public $message;
    /**
     * @SWG\Property(format = "int64", enum = {1, 2})
     * @var integer
     */
    public $status;
}
