<?php require_once './_init.php';

use models\Employee;

@[
  'employeeId' => $employeeId,
] = $_POST;

if ($employeeId) {
  if (Employee::delete($employeeId)) {
    header('Location: ' . CONFIG['APP_URL']);
  } else {
    echo 'Nothing to delete';
  }
}
