<?php
namespace api\modules\v1\models\search;

use Yii;
use api\modules\v1\models\Help;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class HelpSearch extends Help
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [
                [
                    'id',
                    'uid',
                    'is_emergency',
                    'is_pay',
                    'end_date',
                    'comment_count',
                ],
                'integer',
            ],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param int $type
     * @return \yii\data\ActiveDataProvider
     */
    public function search($action, $params)
    {
        $query = parent::find()->select(['{{help}}.*','{{user}}.nickname','{{user}}.avatar'])
            ->where([])
            ->joinWith('user');

        $this->load($params, '');
        if(!$this->validate()){
            return $this;
        }

        $order = [];
        if(1 == $this->end_date){//0-最新(default) 1-截止 2-全部
            $order = ['end_date' => SORT_DESC];
        }elseif(2 == $this->end_date){
            $order = ['id' => SORT_ASC];
        }else{
            $order = ['id' => SORT_DESC];
        }

        if(1 == $this->comment_count){//0-回复少 1-回复多
            $order['comment_count'] = SORT_DESC;
        }else{
            $order['comment_count'] = SORT_ASC;
        }

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['is_emergency' => $this->is_emergency])
            ->andFilterWhere(['is_pay' => $this->is_pay]);

        $dataProvider =  Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $params,
                'pageParam'=> 'page',
                'pageSizeParam' => 'limit',
                'defaultPageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => $order,
                'params' => $params,
            ],
        ]);
        return $dataProvider;
    }

}