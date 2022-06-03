module.exports.run = async (bot, message, args) => {

    if(!message.member.permissions.has("KICK_MEMBERS")) return message.reply("Jij hebt niet de benodigde permissies");

    await message.channel.permissionOverwrites.set([

        {
            id: message.guild.roles.cache.find(r => r.name === "@everyone").id,
            allow: ["SEND_MESSAGES"]
        }

    ]);

    return message.channel.send("Kanaal is weer open");

}

module.exports.help = {
    name: "unlock",
    category: "admin",
    description: "Zet een channel weer open"
    
}