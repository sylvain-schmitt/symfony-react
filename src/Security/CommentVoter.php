<?php


namespace App\Security;


use App\Entity\Comment;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CommentVoter extends Voter
{
    const Edit = 'EDIT_COMMENT';

    protected function supports(string $attribute, $subject)
    {
        return
            $attribute === self::Edit &&
            $subject instanceof Comment;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof User ||
            !$subject instanceof  Comment
        ){
            return false;
        }

        return $subject->getAuthor()->getId() === $user->getId();
    }
}