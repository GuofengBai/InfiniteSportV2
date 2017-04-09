<?php
/**
 * Created by PhpStorm.
 * User: baiguofeng
 * Date: 2016/11/29
 * Time: 10:54
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require_once '../controller/user_controller.php';
require_once '../controller/activity_controller.php';
require_once '../controller/sports_controller.php';
require_once '../controller/social_club_controller.php';

$app = new \Slim\App;
$app->post('/api/login', function (Request $request, Response $response) {
    $data=$request->getParsedBody();
    $id=filter_var($data['id'], FILTER_SANITIZE_STRING);
    $password=filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new user_controller();
    $response->getBody()->write($controller->login($id,$password));

    return $response;
});
$app->get('/api/logout', function (Request $request, Response $response) {
    $controller = new user_controller();
    $response->getBody()->write($controller->logout());

    return $response;
});
$app->get('/api/user/', function (Request $request, Response $response) {
    $controller = new user_controller();
    $response->getBody()->write($controller->getAllUser());

    return $response;
});
$app->post('/api/user/', function (Request $request, Response $response) {
    $data=$request->getParsedBody();
    $id=filter_var($data['id'], FILTER_SANITIZE_STRING);
    $name=filter_var($data['name'], FILTER_SANITIZE_STRING);
    $password=filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new user_controller();
    $response->getBody()->write($controller->addUser($id,$name,$password));
    return $response;
});
$app->put('/api/user/{id}', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $email=filter_var($data['email'], FILTER_SANITIZE_STRING);
    $profile=filter_var($data['profile'], FILTER_SANITIZE_STRING);
    $controller = new user_controller();
    $response->getBody()->write($controller->updateUser($id,$email,$profile));
    return $response;
});
$app->put('/api/user/{id}/password', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $ops=filter_var($data['old_password'], FILTER_SANITIZE_STRING);
    $nps=filter_var($data['new_password'], FILTER_SANITIZE_STRING);
    $controller = new user_controller();
    $response->getBody()->write($controller->updatePassword($id,$ops,$nps));
    return $response;
});
$app->post('/api/user/search', function (Request $request, Response $response) {
    $data=$request->getParsedBody();
    $search=filter_var($data['to_search'], FILTER_SANITIZE_STRING);
    $controller = new user_controller();
    $response->getBody()->write($controller->searchUser($search));

    return $response;
});
$app->get('/api/user/{id}', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new user_controller();
    $response->getBody()->write($controller->getUser($id));

    return $response;
});
$app->get('/api/activity/', function (Request $request, Response $response) {
    $controller = new activity_controller();
    $response->getBody()->write($controller->getAllActivity());

    return $response;
});
$app->post('/api/activity/', function (Request $request, Response $response) {
    session_start();
    $id=$_SESSION['id'];
    $data=$request->getParsedBody();
    $name=filter_var($data['name'], FILTER_SANITIZE_STRING);
    $bonus=filter_var($data['bonus'], FILTER_SANITIZE_STRING);
    $sd=filter_var($data['start_date'], FILTER_SANITIZE_STRING);
    $ed=filter_var($data['end_date'], FILTER_SANITIZE_STRING);
    $des=filter_var($data['description'], FILTER_SANITIZE_STRING);
    $controller = new activity_controller();
    $response->getBody()->write($controller->createActivity($id,$name,$sd,$ed,$des,$bonus));

    return $response;
});
$app->delete('/api/activity/{id}', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->destroyActivity($id));

    return $response;
});
$app->post('/api/user/{id}/activity/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $aid=filter_var($data['a_id'], FILTER_SANITIZE_STRING);
    $controller = new activity_controller();
    $response->getBody()->write($controller->joinActivity($id,$aid));

    return $response;
});
$app->delete('/api/user/{uid}/activity/{aid}', function (Request $request, Response $response,$args) {
    $uid=$args['uid'];
    $aid=$args['aid'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->quitActivity($uid,$aid));

    return $response;
});
$app->get('/api/activity/{id}', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->getActivity($id));

    return $response;
});
$app->get('/api/activity/{id}/joiner/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->getActivityJoiner($id));

    return $response;
});
$app->get('/api/user/{id}/activity/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->getUserActivity($id));

    return $response;
});
$app->get('/api/user/{id}/activity_joined/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->getJoinedActivity($id));

    return $response;
});
$app->get('/api/user/{id}/activity_created/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    $response->getBody()->write($controller->getCreatedActivity($id));

    return $response;
});
$app->get('/api/user/{id}/activity_todo/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new activity_controller();
    return $controller->getUncompleteActivity($id);
});
$app->get('/api/user/{id}/weekly_goal', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();
    $response->getBody()->write($controller->getWeeklyGoal($id));

    return $response;
});
$app->post('/api/user/{id}/weekly_goal', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $goal=filter_var($data['goal'], FILTER_SANITIZE_STRING);
    $controller = new sports_controller();
    $response->getBody()->write($controller->setWeeklyGoal($id,$goal));

    return $response;
});
$app->get('/api/user/{id}/sport_days', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();

    return $controller->getTotalSportDays($id);
});
$app->get('/api/user/{id}/sport_record/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();
    $response->getBody()->write($controller->getSportRecord($id));

    return $response;
});
$app->get('/api/user/{id}/sport_record_total', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();
    $response->getBody()->write($controller->getTotalSportRecord($id));

    return $response;
});
$app->get('/api/user/{id}/sport_record_weekly', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();
    $response->getBody()->write($controller->getWeeklySportRecord($id));

    return $response;
});
$app->post('/api/user/{id}/sport_record/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $date=filter_var($data['publish_date'], FILTER_SANITIZE_STRING);
    $steps=filter_var($data['steps'], FILTER_SANITIZE_STRING);
    $miles=filter_var($data['miles'], FILTER_SANITIZE_STRING);
    $calorie=filter_var($data['calorie'], FILTER_SANITIZE_STRING);
    $controller = new sports_controller();
    $response->getBody()->write($controller->updateSportRecord($id,$date,$steps,$miles,$calorie));
    return $response;
});
$app->get('/api/user/{id}/weight_record/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();
    $response->getBody()->write($controller->getWeightRecord($id));

    return $response;
});
$app->post('/api/user/{id}/weight_record/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $date=filter_var($data['publish_date'], FILTER_SANITIZE_STRING);
    $weight=filter_var($data['weight'], FILTER_SANITIZE_STRING);
    $controller = new sports_controller();
    $response->getBody()->write($controller->updateWeightRecord($id,$date,$weight));
    return $response;
});
$app->get('/api/user/{id}/sleep_record/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new sports_controller();
    $response->getBody()->write($controller->getSleepRecord($id));

    return $response;
});
$app->post('/api/user/{id}/sleep_record/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $date=filter_var($data['publish_date'], FILTER_SANITIZE_STRING);
    $full_sleep=filter_var($data['full_sleep'], FILTER_SANITIZE_STRING);
    $deep_sleep=filter_var($data['deep_sleep'], FILTER_SANITIZE_STRING);
    $controller = new sports_controller();
    $response->getBody()->write($controller->updateSleepRecord($id,$date,$full_sleep,$deep_sleep));
    return $response;
});
$app->get('/api/user/{id}/following/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new social_club_controller();
    $response->getBody()->write($controller->getFollowing($id));

    return $response;
});
$app->post('/api/user/{id}/following/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $followingid=filter_var($data['followingid'], FILTER_SANITIZE_STRING);
    $controller = new social_club_controller();
    $response->getBody()->write($controller->setFollowing($id,$followingid));

    return $response;
});
$app->delete('/api/user/{id}/following/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $data=$request->getParsedBody();
    $followingid=filter_var($data['followingid'], FILTER_SANITIZE_STRING);
    $controller = new social_club_controller();
    $response->getBody()->write($controller->unsetFollowing($id,$followingid));

    return $response;
});
$app->get('/api/user/{id}/weekly_rank/', function (Request $request, Response $response,$args) {
    $id=$args['id'];
    $controller = new social_club_controller();
    $response->getBody()->write($controller->getWeeklyRank($id));

    return $response;
});
$app->run();