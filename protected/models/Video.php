<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $url_preview
 * @property string $url_video
 * @property string $iframe
 */
class Video extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     *
     * @return Video the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'video';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return [
            ['title, url_preview, url_video', 'length', 'max' => 255],
            ['description, iframe', 'safe'],
            ['id, title, description, url_preview, url_video, iframe', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'title'       => 'Title',
            'description' => 'Description',
            'url_preview' => 'Url Preview',
            'url_video'   => 'Url Video',
            'iframe'      => 'Iframe',
        ];
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('url_preview', $this->url_preview, true);
        $criteria->compare('url_video', $this->url_video, true);
        $criteria->compare('iframe', $this->iframe, true);

        return new CActiveDataProvider($this, [
            'criteria' => $criteria,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function setAttributes($values, $safeOnly = true)
    {
        if ($this->getIsNewRecord()) {
            $urlVideo = $values['url_video'] ?: ($values['iframe'] ?
                VideoService::getUrlFromIframe($values['iframe']) :
                null);

            if ($urlVideo) {
                $provider     = ProviderFactory::create($urlVideo);
                $videoService = new VideoService($urlVideo, $provider);
                $dataVideo    = $videoService->getDataVideo();

                $values = array_merge($values, $dataVideo);
            }
        }

        parent::setAttributes($values, $safeOnly = true);
    }
}
