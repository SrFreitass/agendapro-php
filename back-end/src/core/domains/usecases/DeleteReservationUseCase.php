<?php

use Src\Application\Utils\Response;
use Src\Core\Repositories\ReservationRepository;

require_once __DIR__ . "/../../repositories/ReservationRepository.php";
require_once __DIR__ . "/../../../application/utils/Response.php";

class DeleteReservationUseCase {
    public function __construct(private ReservationRepository $repository) {}

    public function execute(string $id) {

        $reservation = $this->repository->get($id);

        if (!$reservation) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Reserva não encontrada!"
                ],
                404
            );
        }

        $res = $this->repository->delete($id);

        if (!$res) {
            return Response::json(
                [
                    "success" => false,
                    "message" => "Erro ao deletar reserva!"
                ],
                500
            );
        }

        return Response::json(
            [
                "success" => true,
                "message" => "Reserva deletada com sucesso!"
            ],
            200
        );
    }
}