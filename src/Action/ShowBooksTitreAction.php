<?php

namespace App\Action;

use App\Domain\Livre\Service\ShowBooksTitre;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ShowBooksTitreAction
{
	private $userCreator;

	public function __construct(ShowBooksTitre $userCreator)
	{
		$this->userCreator = $userCreator;
	}

	public function __invoke(
		ServerRequestInterface $request,
		ResponseInterface $response
	): ResponseInterface {
		// Collect input from the HTTP request

		$id = $request->getAttribute("titre",0);

		// Invoke the Domain with inputs and retain the result
		$userId = $this->userCreator->createUser($id);

		// Transform the result into the JSON representation
		$result = [
			'livre' => $userId
		];

		// Build the HTTP response
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
