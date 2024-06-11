<?php
declare(strict_types=1);

use Entity\TVshow;
use Entity\Exception\EntityNotFoundException;
use Exception\ParameterException;
try{

} catch (ParameterException) {
http_response_code(400);
} catch (EntityNotFoundException) {
http_response_code(404);
} catch (Exception) {
http_response_code(500);
}