<?php
/**
 * class FacebookController
 * @author Igor Ivanović
 * Used to controll facebook login system
 */
class FacebookController extends Controller
{

    /**
     * This method authenticate logged in facebook user
     * @param type $id string(int)
     * @param type $name string
     * @param type $surname string
     * @param type $username string
     * @param type $email string
     * @param type $session string
     */
    public function actionLogin($id = null, $name = null, $surname = null, $username = null, $email = null, $picture = null, $session = null)
    {

        if (!Yii::app()->request->isAjaxRequest) {
            echo json_encode(array('error' => 'this is not ajax request'));
            die();
        } else {
            if (empty($email)) {
                echo json_encode(array('error' => 'email is not provided'));
                die();
            }
            if ($session == Yii::app()->session->sessionID) {
                //p($_REQUEST);
                //$user = User::prepareUserForAuthorisation( $email );

                $record = User::model()->find(array(
                        'condition' => 'email=:email',
                        'params' => array(':email' => $email))
                );
                if (!$record) {
                    $user = new User();
                    $user->email = $email;
                    $user->first_name = $name;
                    $user->last_name = $surname;
                    $user->facebook_id = $username;
                    $user->password = "";
                    $user->is_fblogin = 1;
                    $user->role_id = $_GET['type'];
                    $user->password = md5($username);
                    $user->facebook_picture = "http://graph.facebook.com/" . $username . "/picture?type=large";
                    $user->insert();
                    $identity = new UserIdentity($user->email, $username);
                    $identity->authenticate();
                }
                else{
                   // $user = User::model()->loadModel($record->id);
                    $identity = new UserIdentity($record->email, $username);
                    $identity->authenticate();
                }





                if ($identity->errorCode === UserIdentity::ERROR_NONE) {
                    Yii::app()->user->login($identity, NULL);
                    //common::closeColorBox($this->createUrl('vendor/index'));
                    if ($_GET['type'] == 2)
                    echo json_encode(array('error' => 0, 'redirect' => $this->createUrl('/eventPlanner/step1')));
                    else
                        echo json_encode(array('error' => 0, 'redirect' => $this->createUrl('/vendor/step1')));
                } else {
                    echo json_encode(array('error' => 'user not logged in'));
                    die();
                }
            } else {
                echo json_encode(array('error' => 'session id is not the same'));
                die();
            }
        }
    }


}