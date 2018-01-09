<?php

namespace MauriceBot\Webhook;

/**
 * Run the correct action
 *
 * @link       http://esiea.fr
 * @since      1.0.0
 *
 * @author    Tanguy Giton, Mamoun Sqalli, Vincent Scheffer
 */
class Action
{

    private $request;

    private $response;

    private $model;

    public function __construct(RequestInterface $request, ResponseInterface $response, Model $model)
    {
        $this->request  = $request;
        $this->response = $response;
        $this->model    = $model;
    }

    /**
     * Execute the action ask by the request
     */
    public function execute()
    {
        $action     = $this->request->get_action();

        switch ($action) {
            case 'prix':
                $this->prix_action();
                break;
            default:
                $this->error();
        }
    }

    private function prix_action()
    {
        $annee = $this->request->get_parameter('admission-annee');

        switch ($annee) {
            case '1ère année':
                $year_code = '1a';
                break;
            case '2ème année':
                $year_code = '2a';
                break;
            case '3ème année':
                $year_code = '3a';
                break;
            case '4ème année':
                $year_code = '4a';
                break;
            case '5ème année':
                $year_code = '5a';
                break;
            default:
                $annee     = null;
                $year_code = null;
        }

        $prix = $this->model->price_by_year($year_code);

        $this->response->add_context_out(new DialogflowContext('prix-followup', ['admission-annee' => $annee], 5));
        $this->response->set_followup_event(new DialogflowEvent('prix_reponse', ['prix' => $prix]));
    }

    private function error()
    {
        // TODO
        die();
    }

    /**
     * @return string
     */
    public function format_json()
    {
        return json_encode($this->response);
    }
}