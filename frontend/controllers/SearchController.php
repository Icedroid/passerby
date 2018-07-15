<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-05 13:08
 */

namespace frontend\controllers;

use common\models\meta\ArticleMetaTag;
use yii;
use frontend\models\Article;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class SearchController extends Controller
{

    /**
     * 搜索
     *
     * @return string
     */
    public function actionIndex()
    {
        $where = ['type' => Article::ARTICLE];
        $query = Article::find()->select([])->where($where);
        $keyword = htmlspecialchars(yii::$app->getRequest()->get('q'));
        $query->andFilterWhere(['like', 'title', $keyword]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $this->render('/article/index', [
            'dataProvider' => $dataProvider,
            'type' => yii::t('frontend', 'Search keyword {keyword} results', ['keyword'=>$keyword]),
        ]);
    }

    public function actionTag($tag='')
    {
        $metaTagModel = new ArticleMetaTag();
        $aids = $metaTagModel->getAidsByTag($tag);
        $where = ['type' => Article::ARTICLE];
        $query = Article::find()->select([])->where($where)->where(['in', 'id', $aids]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $this->render('/article/index', [
            'dataProvider' => $dataProvider,
            'type' => yii::t('frontend', 'Tag {tag} related articles', ['tag'=>$tag]),
        ]);
    }
}
