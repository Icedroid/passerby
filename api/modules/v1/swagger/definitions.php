<?php

namespace app\models\v1\swagger;

/**
 * @SWG\Definition(
 *      definition="Error",
 *      required={"code", "msg", "data"},
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=0
 *      ),
 *      @SWG\Property(
 *          property="msg",
 *          type="string",
 *          example="You are requesting with an invalid credential."
 *      ),
 *      @SWG\Property(
 *          property="data",
 *          type="array",
 *          @SWG\Items(
 *          ),
 *      ),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="User",
 *      required={"access_token", "accountCode", "accountName", "mobile"},
 * 	    @SWG\Property(property="access_token", type="string", example="59a1af448c3cd7f250e0635c39a05a5a", description="access_token"),
 * 		@SWG\Property(property="accountCode", type="string", example="d011i1", description="账户代码"),
 * 		@SWG\Property(property="accountName", type="string", example="陈楚楚", description="账户名称"),
 * 		@SWG\Property(property="mobile", type="string", description="手机号"),
 * 		@SWG\Property(property="positionName", type="string", description="网电销售顾问1")
 * )
 */

/**
 * @SWG\Definition(
 *      definition="Car",
 *      required={"id", "name", "image", "voice_type", "sort"},
 * 	    @SWG\Property(property="id", type="integer", example=1, description="车型ID"),
 * 		@SWG\Property(property="name", type="string", description="车型名称"),
 * 		@SWG\Property(property="image", type="string", description="车型图片"),
 * 		@SWG\Property(property="voice_type", type="integer", description="音箱类型 0-普通音箱 1-BOSE音箱"),
 * 		@SWG\Property(property="sort", type="integer", description="显示排序,值越小越靠前")
 * )
 */

/**
 * @SWG\Definition(
 *      definition="Experience",
 *      required={"car_id", "agency_id"},
 * 	    @SWG\Property(property="car_id", type="integer", example=1, description="车型ID"),
 * 		@SWG\Property(property="item_1", type="integer", description="静态体验是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_2", type="integer", description="动态体验是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_11", type="integer", description="静态体验-普通音箱是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_12", type="integer", description="静态体验-BOSE音箱真实是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_13", type="integer", description="静态体验-BOSE音箱环绕是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_14", type="integer", description="静态体验-BOSE音箱高低是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_15", type="integer", description="静态体验-空调是否完成,0-N 1-Y"),
 * 		@SWG\Property(property="item_16", type="integer", description="静态体验-噪音是否完成,0-N 1-Y"),
 * )
 */

 /**
 * @SWG\Definition(required={"id"}, @SWG\Xml(name="Id"))
 */
class Id
{
    /**
     * 用户ID
     *
     * @SWG\Property(example = 10000)
     *
     * @var integer
     */
    public $id;
}

/**
 * @SWG\Definition(required={"access_token", "username"}, @SWG\Xml(name="UserIdList"))
 */
class UserIdList
{
    /**
     * Access Token
     *
     * @SWG\Property()
     *
     * @var string
     */
    public $access_token;
    /**
     * @SWG\Property()
     *
     * @var Id[]
     */
    public $idList;
}