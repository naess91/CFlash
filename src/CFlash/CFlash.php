<?php

namespace CFlash\CFlash;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CFlash implements \Anax\DI\IInjectionAware {

    use \Anax\DI\TInjectable;

    /**
     * View all comments.
     *
     * @return void
     */
	 
	 
	 
    private function addMessage($message, $type) {

        $flashParams = ['message' => $message,'type' => $type,];
		
		$flashMessage = $this->session->get('flash');
		
        $flashMessage[] = $flashParams;

        $this->session->set('flash', $flashMessage);
    }

    public function CustomMessage($message, $type) {

        $this->addMessage($message, $type);
    }

  

    public function deleteMessages() {

        $this->session->set('flash', []);
    }

    public function displayFlashMessages() {

        $messages = $this->session->get('flash');

        $html = "";

        foreach ($messages as $message) {

            $html .= "<div id = 'flashMessage' class='" . $message['type'] . "'><img style = 'float:left; margin-top:10px; margin-left:20px'src ='img/flash/" . $message['type'] . ".png' alt = 'type'> <p >" . $message['message'] . "</p></div>";
        }

        $this->deleteMessages();

        return $html;
    }
}
