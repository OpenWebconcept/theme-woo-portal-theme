<?php

namespace OpenWOO\Fields;

use OpenWOO\Traits\AttachmentToPostID;

class BijlageinformatieverzoekField extends Field
{
    use AttachmentToPostID;

    public function get()
    {
        $attachmentID = $this->saveGravityFormsURLToMediaLibrary($this->value);

        return $attachmentID ? \wp_get_attachment_url($attachmentID) : '';
    }
}
