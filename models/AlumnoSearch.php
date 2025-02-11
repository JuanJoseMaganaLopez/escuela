<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alumno;

/**
 * AlumnoSearch represents the model behind the search form of `app\models\Alumno`.
 */
class AlumnoSearch extends Alumno
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alu_id', 'alu_appaterno', 'alu_apmaterno', 'alu_reticula_id', 'alu_semestre'], 'integer'],
            [['alu_nombre', 'alu_nocontrol'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Alumno::find();

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
            'alu_id' => $this->alu_id,
            'alu_appaterno' => $this->alu_appaterno,
            'alu_apmaterno' => $this->alu_apmaterno,
            'alu_reticula_id' => $this->alu_reticula_id,
            'alu_semestre' => $this->alu_semestre,
        ]);

        $query->andFilterWhere(['like', 'alu_nombre', $this->alu_nombre])
            ->andFilterWhere(['like', 'alu_nocontrol', $this->alu_nocontrol]);

        return $dataProvider;
    }
}
