<?php

namespace modules\enquiry\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modules\enquiry\models\Enquiry;

/**
 * EnquirySearch represents the model behind the search form about `modules\enquiry\models\Enquiry`.
 */
class EnquirySearch extends Enquiry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enquiry_id', 'user_id', 'query_assigned_to', 'created_by', 'updated_by'], 'integer'],
            [['customer_name', 'email', 'phone', 'budget', 'description', 'status', 'remark', 'remark_date', 'last_status_change_date', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Enquiry::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'enquiry_id' => $this->enquiry_id,
            'user_id' => $this->user_id,
            'query_assigned_to' => $this->query_assigned_to,
            'remark_date' => $this->remark_date,
            'last_status_change_date' => $this->last_status_change_date,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'budget', $this->budget])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
