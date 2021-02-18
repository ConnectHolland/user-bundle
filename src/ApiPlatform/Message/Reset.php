<?php

declare(strict_types=1);

/*
 * This file is part of the user bundle package.
 * (c) Connect Holland.
 */

namespace ConnectHolland\UserBundle\ApiPlatform\Message;

use ApiPlatform\Core\Annotation as Api;

/**
 * Password reset resource.
 *
 * @Api\ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     messenger=true,
 *     collectionOperations={
 *         "password-reset" = {
 *              "method"   = "POST",
 *              "consumes" = {
 *                  "application/json"
 *              },
 *              "produces" = {
 *                  "application/json"
 *              },
 *              "route_name"      = "connectholland_user_reset.api",
 *              "swagger_context" = {
 *                  "summary"         = "Reset password through the API.",
 *                  "tags"            = {"Account"},
 *                  "responses"       = {
 *                      "200" = {
 *                          "description" = "The password reset is requested succesfully",
 *                          "schema"      = {
 *                              "type" = "object",
 *                              "properties" = {
 *                                  "token" = {
 *                                      "type" = "string"
 *                                  }
 *                              }
 *                          }
 *                      },
 *                  },
 *              },
 *         }
 *     },
 *     itemOperations={}
 * )
 */
class Reset
{
    /**
     * @var string
     * @Api\ApiProperty(identifier=true)
     */
    public $username;
}
