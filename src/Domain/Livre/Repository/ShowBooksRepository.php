<?php

namespace App\Domain\Livre\Repository;

use PDO;

/**
 * Repository.
 */
class ShowBooksRepository
{
	/**
	 * @var PDO The database connection
	 */
	private $connection;

	/**
	 * Constructor.
	 *
	 * @param PDO $connection The database connection
	 */
	public function __construct(PDO $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * Insert user row.
	 *
	 * @param array $user The user
	 *
	 * @return int The new ID
	 */
	public function selectAllBook(): array
	{
		$sql = "SELECT * FROM alcohol";
		$query = $this->connection->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}

