<?php

namespace App\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use App\GraphQL\Type\UserType;
use App\GraphQL\Type\MessageType;

class ThreadType extends AbstractObjectType
{

  /**
   * @param ObjectTypeConfig $config
   *
   * @return mixed
   */
  public function build($config)
  {
    $config->addFields([
      'id' => new NonNullType(new IdType()),
      'participants' => new ListType(new UserType()),
      'messages' => new ListType(new MessageType()),
      'lastMessage' => new MessageType()
    ]);
  }
}