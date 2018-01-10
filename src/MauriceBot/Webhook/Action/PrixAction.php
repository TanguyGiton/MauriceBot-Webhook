<?php

namespace MauriceBot\Webhook;


class PrixAction implements ActionInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    /**
     * @param RequestInterface $request
     * @param ResponseBuilderInterface $response_builder
     *
     * @return ResponseInterface
     */
    public function run(RequestInterface $request, ResponseBuilderInterface $response_builder)
    {
        $annee = $request->getParameter('admission-annee');

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
                $year_code = null;
        }

        $prix = $this->model->price_by_year($year_code);

        return $response_builder
            ->addContextOut('prix-followup', ['admission-annee' => $annee], 5)
            ->setFollowupEvent('prix_reponse', ['prix' => $prix])
            ->getResponse();
    }

    /**
     * @return string the action name
     */
    public function getName()
    {
        return '';
    }
}