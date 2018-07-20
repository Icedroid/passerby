<?php

namespace app\models\v1\swagger;

/**
 * @SWG\Tag(
 *   name="user",
 *   description="用户接口",
 * )
 *
 * @SWG\Tag(
 *   name="collect",
 *   description="用户收藏接口",
 * )
 *
 * @SWG\Tag(
 *   name="experience",
 *   description="用户经历接口",
 * )
 *
 * @SWG\Tag(
 *   name="help",
 *   description="求助接口",
 * )
 *
 * @SWG\Tag(
 *   name="star",
 *   description="评分接口",
 * )
 *
 * @SWG\Tag(
 *   name="other",
 *   description="其他接口",
 * )
 */


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
 * 		@SWG\Property(property="nickname", type="string", description="用户昵称"),
 * 		@SWG\Property(property="avatar", type="string", description="用户头像"),
 * 		@SWG\Property(property="gender", type="integer", description="性别"),
 * 		@SWG\Property(property="birthday", type="integer", description="生日"),
 * 		@SWG\Property(property="education", type="integer", description="教育"),
 * 		@SWG\Property(property="marriage", type="integer", description="婚姻"),
 * 		@SWG\Property(property="job", type="string", description="职业"),
 * 		@SWG\Property(property="is_special", type="integer", description="是否是过来人"),
 * )
 */

/**
 * userInfo    OBJECT    用户信息对象，不包含 openid 等敏感信息
 * rawData    String    不包括敏感信息的原始数据字符串，用于计算签名。
 * signature    String    使用 sha1( rawData + sessionkey ) 得到字符串，用于校验用户信息，参考文档 signature。
 * encryptedData    String    包括敏感数据在内的完整用户信息的加密数据，详细见加密数据解密算法
 * iv    String    加密算法的初始向量，详细见加密数据解密算法
 *
 * @SWG\Definition(
 *      definition="WechatUser",
 *      required={"rawData", "signature", "encryptedData", "iv"},
 * 		@SWG\Property(property="rawData", type="string", description="微信getUserInfo返回的rawData"),
 * 		@SWG\Property(property="signature", type="string", description="微信getUserInfo返回的signature"),
 * 		@SWG\Property(property="encryptedData", type="string", description="微信getUserInfo返回的encryptedData"),
 * 		@SWG\Property(property="iv", type="string", description="微信getUserInfo返回的iv"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="UserCollect",
 *      required={"uid"},
 * 		@SWG\Property(property="uid", type="integer", description="被收藏的用户ID"),
 * 		@SWG\Property(property="remark", type="string", description="备注"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="UserExperience",
 * 		@SWG\Property(property="content", type="string", description="详细内容"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="Help",
 *     required={"content"},
 * 		@SWG\Property(property="content", type="string", description="经历内容"),
 * 		@SWG\Property(property="is_emergency", type="integer", description="是否紧急 0-否 1-是"),
 * 		@SWG\Property(property="is_pay", type="integer", description="是否愿意付费 0-否 1-是"),
 * 		@SWG\Property(property="end_date", type="integer", description="截止日期，如20180101'"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="HelpComment",
 *     required={"help_id", "content"},
 *     @SWG\Property(property="help_id", type="integer", description="求助帖子ID"),
 * 		@SWG\Property(property="content", type="string", description="详细内容"),
 * )
 */

/**
 * @SWG\Definition(
 *      definition="UserStar",
 *     required={"uid", "content"},
 *     @SWG\Property(property="uid", type="integer", description="被评分的用户ID"),
 *     @SWG\Property(property="understand", type="integer", description="尊重理解，值为1-5"),
 *     @SWG\Property(property="help", type="integer", description="有帮助，值为1-5"),
 *     @SWG\Property(property="reason", type="integer", description="靠谱，值为1-5"),
 * 	   @SWG\Property(property="content", type="string", description="评价内容"),
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