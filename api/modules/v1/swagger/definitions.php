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
 *      required={"access_token", "username"},
 * 	    @SWG\Property(property="access_token", type="string", example="59a1af448c3cd7f250e0635c39a05a5a", description="access_token"),
 * 		@SWG\Property(property="username", type="string", description="用户名"),
 * 		@SWG\Property(property="nickname", type="string", description="用户昵称"),
 * 		@SWG\Property(property="avator", type="string", description="用户头像"),
 * 		@SWG\Property(property="gender", type="integer", description="性别"),
 * 		@SWG\Property(property="birthday", type="integer", description="生日"),
 * 		@SWG\Property(property="education", type="integer", description="教育"),
 * 		@SWG\Property(property="marriage", type="integer", description="婚姻"),
 * 		@SWG\Property(property="job", type="string", description="职业"),
 * 		@SWG\Property(property="is_specail", type="string", description="是否是过来人"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="UserCollect",
 *      required={"access_token", "uid"},
 * 	    @SWG\Property(property="access_token", type="string", example="59a1af448c3cd7f250e0635c39a05a5a", description="access_token"),
 * 		@SWG\Property(property="uid", type="integer", description="被收藏的用户ID"),
 * 		@SWG\Property(property="remark", type="string", description="备注"),
 * 		@SWG\Property(property="avator", type="string", description="用户头像"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="UserExperience",
 *      required={"access_token", "uid"},
 * 	    @SWG\Property(property="access_token", type="string", example="59a1af448c3cd7f250e0635c39a05a5a", description="access_token"),
 * 		@SWG\Property(property="uid", type="integer", description="用户ID"),
 * 		@SWG\Property(property="content", type="string", description="经历内容"),
 * 		@SWG\Property(property="start_date", type="integer", description="开始日期"),
 * 		@SWG\Property(property="end_date", type="integer", description="结束日期"),
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